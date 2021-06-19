<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaction;
use App\Models\transactionDetail;
use App\Http\Requests\transactionRequest;

class transactionAdminController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = transaction::all();//models

        return view('pages.admin.transaction.index',[
            'items' => $items
        ]);
    }

    public function transactionDetail(){
        $items = transactionDetail::all();

        return view('pages.admin.transaction-details.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = transaction::findOrFail($id);
        
        $status= $item->transaction_status;

        return view('pages.admin.transaction.edit',[
            'item' =>$item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(transactionRequest $request, $id)
    {
        $data = $request->all();
        $item = transaction::findOrFail($id);
        $item -> update($data);
        return redirect()->route('transaction-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = transaction::findOrFail($id);
        $item ->delete();
        return redirect()->route('transaction-admin.index');
    }
}
