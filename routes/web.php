<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/send/message', [HomeController::class, 'sendMessage'])->name('send.msg');



Route::get('/event/{code}', [HomeController::class, 'viewEvent'])->name('view.event');
Route::get('/event/{code}/images', [HomeController::class, 'viewEventImages'])->name('view.event.images');

Route::prefix('user')->group(function () {
    Route::get('/event/results', [HomeController::class, 'viewResults'])->name('view.results');
    Route::get('/event/photos/download', [HomeController::class, 'EventResultDownload'])->name('photos.downloadAll');
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::prefix('event')->group(function () {
        Route::get('/add', [AdminController::class, 'viewEvent'])->name('create.event');
        Route::post('/store', [AdminController::class, 'storeEvent'])->name('store.event');

        Route::get('/add/pictures', [AdminController::class, 'viewAddPictures'])->name('add.pictures');
        Route::post('/upload/event/images', [AdminController::class, 'uploadImages'])->name('upload.event.images');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    //  subscription-status-verif AJAX
    Route::post('/subscription-status-verif', [AdminController::class, 'SubcriptionMonthlyCheck']);



    Route::get('/choose/plan', [HomeController::class, 'choosePlan'])->name('choose.plan');

    Route::prefix('stripe')->group(function () {
        Route::get('/checkout', [StripeController::class, 'normalcheckout'])->name('normal.checkout');
        Route::get('/checkout/subscription', [StripeController::class, 'checkoutSubscription'])->name('subscription.checkout');
        Route::get('/checkout/retry/{event_id}', [StripeController::class, 'checkoutRetry'])->name('retry.checkout');
        Route::post('/checkout/subscription/confirm', [StripeController::class, 'StripeSubscriptionPage'])->name('subscription.checkout.confirm');
        Route::post('/checkout/confirm', [StripeController::class, 'StripeCheckoutPage'])->name('payment.checkout.confirm');
    });
});

/// Paiement Status All Routes ////
Route::get('/stripe/payment/status', [StripeController::class, 'StripePaymentStatus'])->name('stripe.status');
Route::get('/stripe/payment/cancel', [StripeController::class, 'StripeCancel'])->name('stripe.cancel');

require __DIR__ . '/auth.php';

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::post('/scan/image', [ScanController::class, 'scanImage'])->name('scan.image');

Route::get('/test-rekognition', [ScanController::class, 'testRekognition'])->name('test.rekognition');
Route::get('/create-rekognition-collection', [ScanController::class, 'createRekognitionCollection'])->name('create.rekognition.collection');
