<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PhotoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $events = Event::where('user_id', Auth::id())->get();

        return view('profile.dashboard', compact('events'));
    }
    //
    public function viewAddPictures()
    {
        return view('admins.pictures.add_pictures');
    }
    public function uploadImages(Request $request)
    {
        $request->validate([
            'photos.*' => 'required|image|max:10240', // max 10MB
        ]);

        $uploaded = [];

        foreach ($request->file('photos') as $file) {
            $filename = $file->getClientOriginalName();

            // Vérifier si la photo existe déjà dans la DB
            $existing = PhotoList::where('filename', $filename)->first();
            if ($existing) {
                continue; // Ignorer les doublons
            }

            // Créer le dossier s'il n'existe pas
            // $path = 'upload/event' . $request->event;
            // $destinationPath = public_path($path);
            // if (!file_exists($destinationPath)) {
            //     mkdir($destinationPath, 0755, true);
            // }
            // $file->move($destinationPath, $filename);

            // Upload sur S3
            $path = $file->store('photos', $filename, 's3');

            // Enregistrer dans la DB
            PhotoList::create([
                'filename' => $filename,
                'path' => $path,
                'event_id' => $request->event // Associer l'événement
            ]);
        }

        return redirect()->route('dashboard')->with('success', ' photos uploaded successfully.');
    }
    public function viewCreateEvent()
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
            $url = config('app.url') . '/event/' . $code;
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
        return Auth::user()->subscription_id
            ? redirect()->route('dashboard')->with('success', 'Event created successfully.')
            : redirect()->route('stripe.checkout')->with('error', 'Effectuer le paiement.');
    }
}
