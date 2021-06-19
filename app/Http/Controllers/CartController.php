<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests\cartRequest;
use App\Http\Controllers\Controller;
use App\Models\itemDetails;
use App\Models\Cart;
use App\Models\gallery;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index(){

        $cart = Cart::all();
    
        $hasil = 0;
        
        $id = Auth::id();
        for($i = 0; $i < $cart->count(); $i++){
            $hasil += $cart[$i]->harga_total;
        }
       
        $items = Cart::with(['item_detail','gallery'])
        ->where('user_id',$id)
        ->get();
       
        return view('pages.shop-cart',[
            'items' =>$items,
            'cart' => $cart,
            'hasil' => $hasil,
            'user' => $id,
        ]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( cartRequest $request){

        $data = $request->all();
        $cart = Cart::where('item_id',$data['item_id'])->first();

        if( !empty($cart) ){
             return redirect()->route('cart.index')->with('duplicated','Item Already Exist'); 
        }else{
            Cart::create($data);
            return redirect()->route('cart.index')->with('massage','Item is on!'); 
        }       
    }

    public function update(cartRequest $request, $id){
        $data = $request->all();
        $item = Cart::findOrFail($id);
        $data['harga_total'] += $data['harga_total'] * ($data['QTY'] - 1)  ;
        $item->update($data);
        return redirect()->route('cart.index')->with('massage','Item Updated');
    }

    public function destroy($id)
    {
        $item = Cart::findOrFail($id);
        $item ->delete();
        return back()->with('massage','Item Removed');
    }


}