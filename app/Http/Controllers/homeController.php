<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\itemDetails;
use App\Models\gallery;
use App\Models\Cart;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function index(Request $request)
    { 
        $cart = Cart::all();
        
        $product = itemDetails::with(['gallery'])
        ->inRandomOrder()
        ->take(4)
        ->get();

        return view('pages.home',[
            'items' => $product ,
            'cart'=> $cart
        ]);
    }
}