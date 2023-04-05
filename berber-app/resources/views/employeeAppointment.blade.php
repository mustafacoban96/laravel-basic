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
             <h1 style="margin-top:15px">Appointments</h1>
          </div>
          <div class="other-buttons">
             @if (Auth::check())
                <p class="user-name">{{Auth::user()->name}}</p>
                <a class="other-button-link" href="{{route('register')}}"><button class="btn">Register</button></a>
                <a class="other-button-link" href="{{route('logout')}}"><button class="btn">Log out</button></a>
             @endif 
          </div>
    </div>
 </div>
 <h2 style="color: aliceblue;text-align:center">{{$employee->name}} Randevu Tablosu</h2>
 

 <div class="emp-appoinment-table">
    <table>
        
        <tr>
            <th>Start time</th>
            <th>End time</th>
            <th style="text-align: center">Appointment</th>
        </tr>
        @for ($i = 0; $i<count($appointments);$i++)
           <tr>
            <td>{{$worktime[$i]->start_time}}</td>
            <td>{{$worktime[$i]->end_time}}</td>
            <form action="">
               <td style="text-align: center"><input type="radio" name="appointmentID" value="{{$appointments[$i]->id}}"></td>
           </tr>
        @endfor
    </table>
   </form>
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