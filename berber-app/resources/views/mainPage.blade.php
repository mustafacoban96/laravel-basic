@extends('layouts.app')


@section('content')
   <div class="navbar-outer">
      <div class="navbar-inner">
            <div class="logo">
               <a href="#default" class="logo-link">
                  <img class="logo-img" src="/image/razor-icon.png">
               </a>
               <p class="logo-title">BERBERİM</p>
            </div>
            <div class="reservation">
               <form class="reservation-form" action="">
                  <button type="submit" class="btn-reserve">Randevu Al</button>
               </form>
            </div>
            <div class="other-buttons">
               <p class="user-name">Mustafa</p>
               <form  class=other-button-form  action="">
                  <button class="btn">Register</button>
               </form>
               <form  class=other-button-form  action="">
                  <button class="btn">Log out</button>
               </form>
               
            </div>
      </div>
   </div>
@endsection