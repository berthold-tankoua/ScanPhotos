<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    //
    public function normalcheckout()
    {
        return view('payment.checkout.normal');
    }
}
