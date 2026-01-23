<?php

namespace App\Http\Controllers;

use App\Models\PhotoList;
use Illuminate\Http\Request;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Support\Facades\Session;

class ScanController extends Controller
{
    public function testRekognition()
    {
        try {
            $client = new RekognitionClient([
                'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
                'version' => 'latest',
                'credentials' => [
                    'key' => env('AWS_ACCESS_KEY_ID'),
                    'secret' => env('AWS_SECRET_ACCESS_KEY'),
                ],
            ]);

            $result = $client->listCollections();

            $collections = $result['CollectionIds'];

            dd($collections);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function createRekognitionCollection()
    {
        $client = new RekognitionClient([
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'version' => 'latest',
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $client->createCollection([
            'CollectionId' => 'all_events',
        ]);
        return response()->json([
            'status' => 'OK',
            'message' => 'Collection AWS Rekognition créée avec succès 🎉'
        ]);
    }
    //
    public function scanImage(Request $request)
    {
        // Validate and process the image
        $request->validate([
            'image' => 'required|image|mimes:png|max:2048',
        ]);

        $image = $request->file('image');
        // ID collection (1 par événement)
        $collectionId = 'event_' . $request->event_id;
        $rekognition = new RekognitionClient([
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'version' => 'latest',
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);
        $result = $rekognition->searchFacesByImage([
            'CollectionId' => $collectionId,
            'Image' => [
                'Bytes' => file_get_contents($image->getRealPath()),
            ],
            'FaceMatchThreshold' => 85,
            'MaxFaces' => 50,
        ]);

        $photoIds = [];
        foreach ($result['FaceMatches'] as $match) {
            $photoIds[] = $match['Face']['ExternalImageId']; // c’est l’ID en DB
        }

        // Récupérer les paths réels depuis la DB
        $photos = PhotoList::whereIn('id', $photoIds)->get();
        Session::forget('photoIds');
        Session::put('photoIds', $photoIds);
        // Redirection vers results avec les photos
        return redirect()->route('view.results')->with('photos', $photos);
    }
}
