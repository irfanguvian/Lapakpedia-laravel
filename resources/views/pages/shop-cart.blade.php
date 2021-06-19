@extends('layouts.app')

@section('title')
    Shopping Cart
@endsection

@section('content')
<main>
  <div class="container-xl">
    <h1>Shopping Cart</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
   @if ( session()->has('duplicated') )
           <div class="alert alert-danger mt-2">
              {{ session()->get('duplicated') }} 
           </div>
    @endif
    @if ( session()->has('massage') )
           <div class="alert alert-success mt-2">
              {{ session()->get('massage') }} 
           </div>
    @endif  
    @if ($cart->count() > 0)
        @foreach ($items as $item)
        <div class="section-cart d-flex border-bottom border-top mt-5">
            <img class="" src="{{ Storage::url ($item->gallery->image) }}" alt="">
          <div class="text-cart">
            <h1>{{$item->item_name}}</h1>
            <h3>Rp{{number_format($item->harga_total, 0 , ',' , '.')}}</h3>
            <form class="d-flex" action="{{ route('cart.update' , $item->id ) }}" method="POST">
              @method('PUT')
              @csrf
                <input type="hidden" name="user_id" value="{{($user)}}">
                <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                <input type="hidden" name="item_name" value="{{ $item->item_name }}">
                <input type="number" id="QTY" name="QTY" class="form-number mt-2 ml-3" value="{{$item->QTY}}" style="width: 40px; height: 40px;" >
                <input type="hidden" name="harga_total" value="{{ ($item->item_detail->harga) * (( 100 - ($item->item_detail->diskon)) / 100)}}">
                <button class="btn" type="submit"><ion-icon class="mt-1" style="font-size:40px" name="add-circle-outline"></ion-icon></button>
            </form>
          </div> 
          <form action="{{ route('cart.destroy' ,$item->id) }}" method="POST" class="align-self-center">
            @method('delete')
            @csrf
            <button href="" type="submit" class="btn">
              <ion-icon class="delete" name="close-circle-outline"></ion-icon>
            </button>
          </form>
        </div>
      @endforeach
        <div class="btn-cart d-flex justify-content-end mt-5">
          <h2>Total : <span>Rp{{number_format($hasil, 0 , ',' , '.')}}</span></h2>
          <a href="{{route('transaction',$user)}}" class="py-2 px-4 btn btn-primary ml-3 btn-bayar">BAYAR SEKARANG</a>
          <a href="{{route('detail',$item->item_detail->slug)}}" class="py-2 px-4 btn btn-primary ml-3 btn-back-items">KEMBALI</a>
       </div> 
    @else
        <div class="btn-cart alert alert-success mt-2">
          <p>There is No Item In the Cart</p>
          <a href="{{route('home')}}" class="py-2 px-4 btn btn-primary mt-3 btn-back-items">Back To Shop</a>
      </div>
    @endif 
</main>
 
@endsection