<div class="container-xl sticky-top">
  <div class="navbar-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a href="{{route('home')}}">
          <img class="logo" src="{{url('frontend/img/logo@2x.png')}}" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 d-flex justify-content-center">
          @guest
          <form>
            <li class="nav-item">
              <a href="{{route('login')}}" class="py-2 px-4 btn btn-primary btn-login">Sign In</a>
            </li>
          </form>
          <form>
            <li class="nav-item">
              <a href="{{route('register')}}" class="py-2 px-4 btn btn-primary btn-sign-up">
                Sign Up
              </a>
            </li>  
          </form>    
          @endguest

          @auth
          <li class="nav-item ml-2 mt-2 float-md-right">
            <a class="cart-icon" href="{{route('cart.index')}}">
              <ion-icon class="mr-2" name="basket"></ion-icon>
              @if ($cart->count() > 0) 
                <span class= "counter-cart" >{{ $cart->count() }}</span>    
              @endif
            </a>
          </li>
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <li class="nav-item ml-5">
              <button class="py-2 px-4 btn btn-primary btn-login" type="submit">Sign Out</button>
            </li>
          </form>   
          @endauth

        </ul>
      </div>
    </nav>
    <hr class="line">
   </div> 
 </div>