@extends('layouts.success')

@section('title')
    Success
@endsection

@section('content')
<main>
    <div class="d-flex align-item-center mt-5">
      <div class="col text-center">
        <img src="{{url('frontend/img/ic_sukses.png')}}" alt="ic_mail">
        <h1>Yay! Success</h1>
        <p>
          We’ve sent you email for transaction
          <br> 
            please read it as well
        </p>
        <a href="{{route('home')}}" class="py-2 px-4 btn btn-primary btn-add-cart">
          Home Page
        </a>
      </div>
    </div>
  </main>
@endsection