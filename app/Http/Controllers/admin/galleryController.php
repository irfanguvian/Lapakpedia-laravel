<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\galleryRequest;
use App\Http\Controllers\Controller;
use App\Models\gallery;
use App\Models\itemDetails;
use Illuminate\Support\Str;

class galleryController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = gallery::with(['item_details'])->get();

        return view('pages.admin.gallery.index',[
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
        $items = itemDetails::all();

        return view('pages.admin.gallery.create',[
            'itemDetails' => $items,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(galleryRequest $request)
    {
        $data = $request->all();
        $items = itemDetails::all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );
        
        gallery::create($data);
        return redirect()->route('gallery.index');    
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
        $gallery = gallery::findOrFail($id);
        $items = itemDetails::all();
        return view('pages.admin.gallery.edit',[
            'itemDetails' => $items,
            'items'=>$gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(galleryRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );
        $item = gallery::findOrFail($id);
        $item -> update($data);
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = gallery::findOrFail($id);
        $item ->delete();
        return redirect()->route('gallery.index');
    }
}
