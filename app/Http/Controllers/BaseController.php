<?php

namespace App\Http\Controllers;

use View;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function __construct()
    {
        // if (Auth::check()) {
        //     $count_cart = Cart::where('user_id', auth()->user()->id)
        //         ->where('status', 0)
        //         ->count();
        //     $carts = Cart::where('user_id', auth()->user()->id)->with('product')->where('status', 0)->latest()->get();
        //     foreach ($carts as $cart) {
        //         $cart->total = $cart->quantity * $cart->product->price;
        //     }
        // } else {
        //     $carts = [];
        //     $count_cart = 0;
        // }
        // View::share('count_cart', $count_cart);
        // View::share('carts', $carts);
    }
}
