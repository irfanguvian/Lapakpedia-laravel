@extends('layouts.app')

@section('title')
    Bukalapak Clone
@endsection

@section('content')
    <div class="container-xl mt-3">
        <div class="photos-wrapper">
            <div class="photo-part-1"></div>
            <div class="photo-part-2">
                <div class="photoChild-1"></div>
                <div class="photoChild-2"></div>
                <div class="photoChild-3"></div>
            </div>
            <div class="photo-part-3"></div>
        </div>
    </div>
    <main>
    <div class="container-xl mt-4">
        <div class="row">
            <div class="ic-list">
                <a href="{{route('category','OTOMOTIF')}}" class="box-icon">
                    <img src="{{url('frontend/img/car-parts.png')}}" alt="">
                    <h4>Otomotif</h4>
                    </a>
                    <a href="{{route('category','CLOTHES')}}" class="box-icon">
                    <img src="{{url('frontend/img/fashion.png')}}" alt="">
                    <h4>Clothes</h4>
                    </a>
                    <a href="{{route('category','GAME')}}" class="box-icon">
                    <img src="{{url('frontend/img/gamepad.png')}}" alt="">
                    <h4>Game</h4>
                    </a>
                    <a href="{{route('category','SHOES')}}" class="box-icon">
                    <img src="{{url('frontend/img/shoes.png')}}" alt="">
                    <h4>Shoes</h4>
                    </a>
                    <a href="{{route('category','Random')}}" class="box-icon">
                    <img src="{{url('frontend/img/shopping-bag.png')}}" alt="">
                    <h4>Random Stuff</h4>
                    </a>      
            </div> 
        </div>
        <div class="row mt-4">
            <img class="banner-mid" src="{{url('frontend/img/banner-nuz-20201006-dweb.jpg.webp')}}"  alt="">
        </div>
    </div>
    <div class="flash-deal">
            <div class="container-xl">
            <div class="row mt-4">
                <div class="col-md-3 mt-5">
                <div class="icon-flash d-flex">
                    <img src="{{url('frontend/img/flashdeal-ico-v2.svg')}}" alt="">
                    <h1 class="ml-3">Flash Deal</h1>
                </div>
                <h4 class="mt-5">Diskon tiap hari sampai 70%!</h4>
                <a href="{{route('category','Random')}}"><div class="py-2 px-4 btn btn-primary btn-flashdeal mt-3"> Lanjutkan</div></a>
                </div>
                <div class="col-12 col-sm-9 col-md-8 mt-5 d-flex barang-barang">
                
                    @foreach ($items as $item)
                    <div class="col-sm-2 item">
                        <div class="card">
                            <img class="card-img-top" src="{{ Storage::url($item->gallery->random()->image) }}" alt="Card image cap">
                            <div class="card-body" style="width: 300px; height: 170px;">
                            <a href="{{route('detail',$item->slug)}}"><p class="card-text text-break">{{$item->item_name}}</p></a>
                            <div class="price-wrap">
                                <p class="card-text harga-akhir">Rp {{$item->discountPrice()}}</p>
                              <div class="diskon d-flex"> 
                                 <p class="card-text harga-awal">@rupiah($item->harga)</p>
                                 <p class="card-text harga-diskon">{{$item->diskon}}%</p>
                              </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection