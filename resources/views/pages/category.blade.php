@extends('layouts.app')

@section('title')
    Items
@endsection

@section('content')
<main>              
    <div class="container-xl"> 
     <div class="section-items">
           
          @foreach ($items as $item)
          <div class="col-sm-2 mt-3">
            <div class="card card-item">
              <img class="card-img-top" src="{{Storage::url($item->gallery->random()->image)}}" alt="Card image cap">
              <div class="card-body pl-3" style="width: 300px; height: 170px;">
                <a href="{{route('detail',$item->slug)}}"><p class="card-text">{{$item->item_name}}</p></a>
                <p class="card-text harga-akhir">Rp {{ $item->discountPrice()}}</p>
                <div class="diskon d-flex"> 
                    <p class="card-text harga-awal">@rupiah($item->harga)</p>
                    <p class="card-text harga-diskon">{{$item->diskon}}%</p>
                </div>
                </div>
            </div>
        </div>
           @endforeach
      </div>
    </div>
   </main>
@endsection