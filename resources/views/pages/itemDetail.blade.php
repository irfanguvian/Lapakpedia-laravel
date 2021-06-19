@extends('layouts.app')

@section('title')
    Detail Page
@endsection

@section('content')
<main>
    <div class="container-xl"> 
       <ol class="breadcrumb">
         <li class="breadcrumb-item">
           Items
         </li>
         <li class="breadcrumb-item active">
           Details
         </li>
       </ol>              
       @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{$error}}</li>
               @endforeach
           </ul>
       </div>
   @endif
    <div class="row detail-page">
      <div class="col-sm-7 col-md-5">
        @if ($item->gallery->count())
                    <div class="gallery">
                        <div class="xzoom-container">
                        <img src="{{Storage::url($item->gallery->get(0)->image)}}" witdh ="660" height ="350" class="xzoom" id="xzoom-default" xoriginal="{{Storage::url($item->gallery->get(1)->image)}}" alt="gallery-1">
                        </div>
                        <div class="xzoom-thumbs">
                            @for ($i = 0; $i < $count; $i++)
                            <a href="{{ Storage::url($item->gallery->get($i)->image)}}">
                                <img src="{{Storage::url($item->gallery->get($i)->image) }}" alt="gallery-1" class="xzoom-gallery" width="128" height="80" xpreview ="{{Storage::url($item->gallery->get($i)->image)}}">
                            </a>
                            @endfor
                        </div>
                    </div>
                    @endif
      </div>
      <div class="col-sm-5 col-md-7 price-detail">
       <h1 class="text-break">{{$item->item_name}}</h1>
         <div class="diskon d-flex ">
           <p class="card-text harga-awal">Rp{{ number_format($item->harga, 0 , ',' , '.') }}</p>
           <p class="card-text harga-diskon"> -{{$item->diskon}}%</p>
         </div>
         <h1 class="card-text harga-akhir">Rp{{ $item->discountPrice() }}</h1>
         <p>Tersedia:<span class="QTY">{{$item->QTY}}</span></p>
         <p class="text-break">{{$item->description}}</p>
         <form action="{{route('cart.store')}}" method="POST">
          @csrf
            <div class="form-group">
              <input type="hidden" name="user_id" value="{{($user)}}">
              <input type="hidden" name="item_id" value="{{ $item->id }}">
              <input type="hidden" name="item_name" value="{{ $item->item_name }}">
              <input type="hidden" name="harga_total" value="{{ ($item->harga) * ( ( 100 - ($item->diskon)) / 100)}}">
              <input type="hidden" name="QTY" value="1">
            </div>
            <button type="submit" class="py-2 px-4 btn btn-primary btn-add-cart"> Add To Cart</button>
         </form>
         <a href="{{route('category',$item->category)}}" class="py-2 px-4 btn btn-primary btn-back-items"> Back To Items</a>
     </div>  
    </div>
  </div> 
   </main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/library/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
  <script src="{{url('frontend/library/xzoom/xzoom.min.js')}}"></script>
  <script>
  $(document).ready(function(){
    $('.xzoom, .xzoom-gallery').xzoom({
      position: "inside",
      title:false,
      tint:'#333',
      xoffset:15
       });
    });
  </script>
@endpush