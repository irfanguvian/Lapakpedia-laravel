<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use App\Http\Requests\itemDetailsRequest;
use App\Http\Controllers\Controller;
use App\Models\itemDetails;
use Illuminate\Support\Str;

class itemDetailsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = itemDetails::all();//models

        return view('pages.admin.itemDetails.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.itemDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(itemDetailsRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->item_name,'-');

        itemDetails::create($data);
        return redirect()->route('itemDetails.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = itemDetails::findOrFail($id);

        return view('pages.admin.itemDetails.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(itemDetailsRequest $request, $id)
    {
        $data = $request->all();
        $item = itemDetails::findOrFail($id);
        $item -> update($data);
        return redirect()->route('itemDetails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = itemDetails::findOrFail($id);
        $item ->delete();
        return redirect()->route('itemDetails.index');
    }
}
