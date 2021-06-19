<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\itemDetails;
use App\Models\gallery;
use App\Models\User;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class detailController extends Controller
{
    public function CategoryPage(Request $request, $category){
        
        $cart = Cart::all();

        if($category == 'Random'){
            $items =itemDetails::with(['gallery'])->get();
        }else{
            $items =itemDetails::with(['gallery'])
                ->where('category',$category)
                ->get();
        }  
        return view('pages.category',[
            'items' => $items,
            'cart'=> $cart
        ]);
    }


    public function itemDetail(Request $request, $slug)
    {
        $cart = Cart::all();
        $item =itemDetails::with(['gallery'])
                ->where('slug',$slug)
                ->firstOrFail();

        
        $id = Auth::id();
       // $users = User::where('id',$id)->get();

        $count = count($item->gallery);
        return view('pages.itemDetail',[
            'item'=> $item,
            'count'=> $count,
            'user' => $id,
            'cart'=> $cart
            
        ]);
    }

}
