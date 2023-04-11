@extends('layouts.app')



@section('content')
@php
      use App\Models\AppointmentStatus;
@endphp
<div class="navbar-outer">
    <div class="navbar-inner">
          <div class="logo">
             <a href="#" class="logo-link">
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


 <div class="emp-appoinment-table" style="margin-top: 1%">
    <table>
        <tr>
            <th>Start time</th>
            <th>End time</th>
            
            <th>Appointment</th>
            <th>Serve Content</th>
        </tr>
        @for ($i = 0; $i<count($appointments);$i++)
           <tr>
            <td>{{$worktime[$i]->start_time}}</td>
            <td>{{$worktime[$i]->end_time}}</td>
                  @if (AppointmentStatus::where('appointment_id',$appointments[$i]->id)->exists())
                  <td style="display: flex; flex-direction:row; margin-left: 5px">
                     <form  action="" >
                        @csrf
                        <button class="staff-cancel-appoint" type="submit"><input type="hidden" name="appointmentId[]" value="{{$appointments[$i]->id}}">&#x2715;</button>
                     </form>
                     <form action="" >
                        @csrf
                        <button class="staff-record-appoint" type="submit"><input type="hidden" name="appointmentId[]" value="{{$appointments[$i]->id}}">&#x2713;</button>
                     </form>
                  </td>
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
                  {{-- @elseif (AppointmentStatus::whereNot('appointment_id',$appointments[$i]->id)->exists()) --}}
                  @else
                     <td style="text-align: center">
                        <form style="margin-left: 30px" action="">
                           @csrf
                           <button class="staff-add-appoint" type="submit"><input type="hidden" name="appointmentId[]" value="{{$appointments[$i]->id}}">EKLE</button>
                     </form>
                     </td>
                     <td style="text-align: center">-------</td>
                  @endif
                  
        @endfor
    </table>
    </div>
    
@endsection