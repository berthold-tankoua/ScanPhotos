<?php

namespace App\Http\Controllers;

use App\Models\PhotoList;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
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
}
