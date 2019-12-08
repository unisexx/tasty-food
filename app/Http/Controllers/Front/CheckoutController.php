<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', @Auth::user()->id)->get();
        } else {
            $carts = Cart::where('session_id', session()->getId())->get();
        }
        return view('front.checkout.index', compact('carts'));
    }
}
