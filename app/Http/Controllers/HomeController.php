<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PhotoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('frontend.welcome');
    }
    public function about()
    {
        return view('frontend.about');
    }

    public function choosePlan()
    {
        return view('profile.choose_plan');
    }

    public function viewEvent($code)
    {
        $event = Event::where('code', $code)->firstOrFail();
        if ($event->status !== 'active') {
            return view('frontend.event.view', compact('event'));
        } else {
            return view('frontend.event.view', compact('event'));
        }
    }
    public function viewEventImages($code)
    {
        $event = Event::where('code', $code)->firstOrFail();
        $images = PhotoList::where('event_id', $event->id)->get();
        if ($event->status !== 'active') {
            return view('frontend.event.images', compact('event', 'images'));
        } else {
            return view('frontend.event.images', compact('event', 'images'));
        }
    }
    public function viewResults()
    {
        if (Session::has('photoIds')) {
            $photoIds = Session::get('photoIds');
        }
        $photos = PhotoList::whereIn('id', $photoIds)->get();
        return view('frontend.results.image', compact('photos'));
    }

    public function downloadAll()
    {
        if (Session::has('photoIds')) {
            $photoIds = Session::get('photoIds');
        }
        $photos = PhotoList::whereIn('id', $photoIds)->get();

        if ($photos->isEmpty()) {
            $notification = [
                'message' => 'Aucune photo à télécharger',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }

        $zipName = 'photos_' . now()->timestamp . '.zip';
        $zipPath = storage_path('app/' . $zipName);

        $zip = new ZipArchive();

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            abort(500, 'Impossible de créer le ZIP');
        }

        foreach ($photos as $photo) {
            // Récupérer le fichier depuis S3
            $fileContent = Storage::disk('s3')->get($photo->path);

            // Nom du fichier dans le ZIP
            $filename = basename($photo->path);

            $zip->addFromString($filename, $fileContent);
        }

        $zip->close();

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
