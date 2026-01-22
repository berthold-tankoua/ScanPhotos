<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('profile.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/take/picture', [HomeController::class, 'takePicture'])->name('take.picture');
Route::post('/scan/image', [ScanController::class, 'scanImage'])->name('scan.image');

Route::post('/admin/event/images', [AdminController::class, 'uploadImages'])->name('admin.event.images');
Route::get('/test-rekognition', [ScanController::class, 'testRekognition'])->name('test.rekognition');
Route::get('/create-rekognition-collection', [ScanController::class, 'createRekognitionCollection'])->name('create.rekognition.collection');
