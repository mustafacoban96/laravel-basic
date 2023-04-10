@extends('layouts.app')



@section('content')
@php
      use App\Models\AppointmentStatus;
@endphp
<div class="navbar-outer">
    <div class="navbar-inner">
          <div class="logo">
             <a href="{{route('mainPage')}}" class="logo-link">
                <img class="logo-img" src="/image/razor-65.png">
             </a>
             <p class="logo-title">Berberim</p>
          </div>
          <div class="reservation">
             {{-- !!!!!!!!!!!!!!!!!! --}}
             <h2 style="color:aliceblue">Staff Page</h2>
          </div>
          
          <div class="other-buttons">
             @if (Auth::check())
                <p class="user-name">{{$name}}</p>
                <a class="other-button-link" href="{{route('register')}}"><button class="btn">Register</button></a>
                <a class="other-button-link" href="{{route('logout')}}"><button class="btn">Log out</button></a>
             @endif 
          </div>
    </div>
 </div>


 <div class="emp-appoinment-table" style="margin-top: 5%">
    <table>
        <tr>
            <th>Start time</th>
            <th>End time</th>
            
            <th style="text-align: center">Appointment</th>
            <th>Hizmet içeriği</th>
        </tr>
        @for ($i = 0; $i<count($appointments);$i++)
           <tr>
            <td>{{$worktime[$i]->start_time}}</td>
            <td>{{$worktime[$i]->end_time}}</td>
                  @if (AppointmentStatus::where('appointment_id',$appointments[$i]->id)->exists())
                  <td style="text-align: center">IPTAL ET</td>
                        @if (empty(AppointmentStatus::where('appointment_id',$appointments[$i]->id)->first()->serves))
                            <td>Hizmet tipi yok</td>
                        @else
                            <td>
                                @foreach (AppointmentStatus::where('appointment_id',$appointments[$i]->id)->first()->serves as $serve)
                                    <li style="list-style-type: none">{{$serve}}</li>
                                @endforeach
                            </td>
                        @endif
                        
                        {{-- <td>{{$appointments[$i]->id}}</td>    --}}
                        
                  @elseif (AppointmentStatus::whereNot('appointment_id',$appointments[$i]->id)->exists())
                     <td style="text-align: center">EKLE</td>
                  @else
                     <td style="text-align: center">
                        <input id="label{{$i}}" type="radio" name="appointmentID" value="{{$appointments[$i]->id}}">
                        <button data-emp="label{{$i}}" type="button" class="appointment-button">Seç</button>
                     </td>
                  @endif
                  
           </tr>
        @endfor
    </table>
    </div>
    
@endsection