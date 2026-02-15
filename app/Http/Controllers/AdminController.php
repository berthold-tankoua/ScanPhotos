<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PhotoList;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Aws\Rekognition\RekognitionClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        $events = Event::where('user_id', Auth::id())->latest()->get();

        return view('profile.dashboard', compact('events'));
    }
    //
    public function viewAddPictures()
    {
        $events = Event::where('user_id', Auth::id())->where('status', 'active')->latest()->get();
        return view('admins.pictures.add_pictures', compact('events'));
    }
    public function uploadImages(Request $request)
    {
        $request->validate([
            'photos.*' => 'required|image|max:10240', // max 10MB
        ]);
        $event = Event::find($request->event);
        $rekognition = new RekognitionClient([
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'version' => 'latest',
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        // ID collection (1 par événement)
        $collectionId = 'event_' . $event->id;

        // (Optionnel mais recommandé) créer la collection si elle n'existe pas
        try {
            $rekognition->createCollection([
                'CollectionId' => $collectionId,
            ]);
        } catch (\Exception $e) {
            // Ignore si elle existe déjà
        }

        foreach ($request->file('photos') as $file) {
            $original = $file->getClientOriginalName();

            // Vérifier si la photo existe déjà dans la DB
            $existing = PhotoList::where('filename', $original)->first();
            if (!$existing) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . rand(1000, 9999) . '.' . $extension;
                // Upload sur S3
                $path = $file->storeAs($event->slug, $filename, 's3');

                // Enregistrer dans la DB
                $photo = PhotoList::create([
                    'filename' => $original,
                    'path' => $path,
                    'event_id' => $request->event // Associer l'événement
                ]);
                // Indexer les visages
                $rekognition->indexFaces([
                    'CollectionId' => $collectionId,
                    'Image' => [
                        'S3Object' => [
                            'Bucket' => env('AWS_BUCKET'),
                            'Name' => $path,
                        ],
                    ],
                    'ExternalImageId' => (string) $photo->id, // lien DB
                    'DetectionAttributes' => [],
                ]);
            }
        }
        return redirect()->route('dashboard')->with('success', ' photos uploaded successfully.');
    }
    public function viewEvent()
    {
        return view('admins.events.add_event');
    }
    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'unique:events,title',
        ], [
            'title.required' => 'Nom deja pris, veuillez en choisir un autre.',
        ]);

        do {
            $code = Auth::id() . Str::lower(Str::random(6));
            $url = config('app.url') . '/event/' . $code . '/images';
        } while (Event::where('url', $url)->exists());
        $event = new Event([
            'user_id'     => Auth::id(),
            'title'       => $request->title,
            'slug'        => Str::lower(Str::slug($request->title)),
            'description' => $request->description,
            'code'       => $code,
            'url'         => $url,
        ]);

        if (Auth::user()->subscription_id) {
            $event->price_paid = null;
            $event->status = 'active';
            $event->payment_status = 'paid';
        }

        $event->save();

        Session::forget('eventId');
        Session::put('eventId', $event->id);
        return Auth::user()->subscription_id
            ? redirect()->route('dashboard')->with('success', 'Event created successfully.')
            : redirect()->route('choose.plan')->with('error', 'Effectuer le paiement.');
    }

    public function SubcriptionMonthlyCheck()
    {

        if (Auth::check()) {
            $userIds = User::whereNotNull('subscription')->pluck('id');

            Event::whereIn('user_id', $userIds)
                ->update([
                    'payment_status' => 'paid',
                    'status' => 'active',
                    'price_paid' => 5,
                ]);
        }
        $now = Carbon::now();

        Subscription::where('status', 'paid')->get()
            ->each(function ($item) use ($now) {
                if ($now->greaterThanOrEqualTo(Carbon::parse($item->end_date))) {
                    $item->update([
                        'status' => 'Cancel',
                    ]);
                }
            });
        $response['status'] = true;
        return $response;
    }
}
