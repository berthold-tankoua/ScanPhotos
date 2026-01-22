<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\Rekognition\RekognitionClient;

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

            $client->listCollections();

            return response()->json([
                'status' => 'OK',
                'message' => 'Connexion AWS Rekognition réussie 🎉'
            ]);
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

        // Process the image (e.g., save it, analyze it, etc.)

        return response()->json(['message' => 'Image scanned successfully.']);
    }
}
