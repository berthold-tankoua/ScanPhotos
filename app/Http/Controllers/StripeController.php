<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
{
    //
    public function normalcheckout()
    {
        return view('payment.checkout.normal');
    }

    public function checkoutRetry($eventId)
    {
        Session::forget('eventId');
        Session::put('eventId', $eventId);
        return view('payment.checkout.normal');
    }

    // Stripe method : CheckoutPage
    public function StripeCheckoutPage(Request $request)
    {

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $domain   = rtrim(env('APP_URL'), '/');

        $amount =  $request->price * 100;

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'USD',
                    'product_data' => [
                        'name' => 'Paiement abonnement ScanPhotos',
                    ],
                    'unit_amount' => $amount,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $domain . '/stripe/payment/status?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => $domain . '/stripe/payment/cancel',
        ]);
        if (Session::has('eventId')) {
            $eventId = Session::get('eventId');
        }
        Subscription::create([
            'user_id' => Auth::id(),
            'event_id' => $eventId ?? null,
            'price' => $request->price,
            'end_date' => Carbon::now()->addMonth(),
            'session_id' => $session->id,
            'status' => 'pending',
        ]);
        return redirect()->away($session->url);
    }
    // Stripe methode 2 END

    public function StripePaymentStatus(Request $request)
    {
        $sessionId = $request->get('session_id');

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            }

            // Infos client directement depuis la session
            $email = $session->customer_details->email ?? null;
            $name  = $session->customer_details->name ?? null;
        } catch (\Exception $e) {
            throw new NotFoundHttpException;
        }

        $data = Subscription::where('session_id', $sessionId)->first();
        $event = Event::find($data->event_id);
        // ---------- MODE PAIEMENT UNIQUE ----------
        if ($session->payment_status === 'paid') {
            $data->status = 'Paid';
            $data->updated_at = Carbon::now();
            $data->save();

            $event->payment_status = 'paid';
            $event->status = 'active';
            $event->price_paid = $data->price;
            $event->save();
            Session::forget('eventId');

            return view('payment.status.success');
        }
        // ---------- PAIEMENT ÉCHOUÉ ----------
        if ($session->payment_status === 'failed') {
            if ($data) {
                $data->payment_status = 'Failed';
                $data->updated_at = Carbon::now();
            }
            Session::forget('eventId');
            Session::put('eventId', $event->id);
            $errorMessage = 'Le paiement a échoué. Veuillez réessayer.';
            return view('payment.status.error', compact('data', 'errorMessage'));
        }

        // Cas particulier (pas de paiement requis)
        return redirect('/')->with('info', 'Aucun paiement requis pour cette commande.');
    }
}
