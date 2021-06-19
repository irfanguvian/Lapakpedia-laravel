<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\transactionDetailRequest;
use App\Models\transactionDetail;
use App\Models\transaction;
use App\Models\User;
use App\Models\Cart;


class transactionController extends Controller
{
    public function index()
    { 
        $id = Auth::id();
       return view('pages.transaction',[
           'user' =>$id
       ]);
    }

    public function transaction(){

    }

    public function store(Request $request){

        $cart = Cart::count();
        $items = Cart::all();
        $price_total = 0;
        $items_total = 0;
        for( $i=0 ; $i < $cart ;$i++){
           $items_total += $items[$i]->QTY;
           $price_total += $items[$i]->harga_total;
        }
        $id = Auth::id();
        $transaction = transaction::create([
            'user_id'=> $id,
            'username'=> Auth::user()->username,
            'items'=> $items_total,
            'transaction_total'=> $price_total,
            'transaction_status' => 'Pending'
        ]);
        
        $data = $request->all();
        transactionDetail::create($data);

        return view('pages.success');
    }

}
