@extends('layouts.app')


@section('content')
<div class="navbar-outer">
    <div class="navbar-inner">
          <div class="logo">
             <a href="#default" class="logo-link">
                <img class="logo-img" src="/image/razor-65.png">
             </a>
             <p class="logo-title">Berberim</p>
          </div>
          <div class="reservation">
             <h1 style="margin-top:15px">Employees</h1>
          </div>
          <div class="other-buttons">
             @if (Auth::check())
                <p class="user-name">{{$username}}</p>
                <a class="other-button-link" href="{{route('register')}}"><button class="btn">Register</button></a>
                <a class="other-button-link" href="{{route('logout')}}"><button class="btn">Log out</button></a>
             @endif 
          </div>
    </div>
 </div>
    <div class="employee-cards-area">
        @foreach ($employees as $employee)
        <div class="employee-info">
            <img src="/image/indir.jpg" class="employee-pic">
            <p class="name">{{$employee->name}}</p>
            <p class="phone-number">{{$employee->phone}}</p>
            <button class="appointment-button">Randevu al</button>
            
        </div>
        @endforeach
        
        <div id="simpleModal" class="modal">
         <div class="modal-content">
             <div class="modal-header">
                 <span class="closeBtn">&times;</span>
                 <h2>Modal Header</h2>
             </div>
             <div class="modal-body">
                 <form action="">
                    @foreach ($serveTypes as $serveType)
                    <li class="serve-type">
                        <label for="sac-kesimi">{{$serveType->name}}</label>
                        <input type="checkbox" name="{{$serveType->name}}">
                    </li>
                    @endforeach
                     <button class="appointment-button">Randevu al</button>
                 </form>
             </div>
             <div class="modal-footer">
                 <h3>Modal Footer</h3>
             </div>
         </div>
     </div>
    </div>
    
 <div class="footer">
    <div class="iletişim">
       <h3>İLETİŞİM</h3>
       <P>Phone: 123-456-7890</P>
       <p>Email:  info@mysite.com</p>
       <div class="social-meida">
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-instagram"></a>
          <a href="#" class="fa fa-snapchat-ghost"></a>
       </div>
    </div>
    <div class="adres">
       <h3>OUR ADDRESS</h3>
       <P>500 Terry Francine Street</P>
       <p>San Francisco, CA 94158</p>

    </div>
    <div class="calisma-saatleri">
       <h3>OPENING HOURS</h3>
       <P>Mon - Fri: 7am - 10pm</P>
       <p>Saturday: 8am - 10pm</p>
       <p>​Sunday: 8am - 11pm</p>

    </div>
 </div>
@endsection



    


