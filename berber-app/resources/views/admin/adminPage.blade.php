@extends('layouts.app')



@section('content')
    <div class="admin-panel-container">
        <div class="vertical-container">
            <div class="admin-panel-title-area">
                <img class="admin-icon" src="/image/admin.png" alt="">
                <h2 class="admin-panel-title">Administrator Panel</h2>
            </div>
            <a class="admin-panel-link" href="def#"><button class="admin-panel-buttons" type="submit">Daily reservation plan</button></a>
            <a class="admin-panel-link" href="{{route('employeePage')}}"><button class="admin-panel-buttons" type="submit">Employee process</button></a>
            <a class="admin-panel-link" href="{{route('customerPage')}}"><button class="admin-panel-buttons" type="submit">Customer process</button></a>

            @if (Auth::check())
                <div class="admin-logout-area">
                    <a class="admin-logout-link" href="{{route('logout')}}"><button class="admin-panel-logout" type="submit">Logout</button></a>
                </div>
            @endif
            
            
        </div>
        <div class="vertical-container2">
            @yield('admin')
        </div>
    </div>
    
@endsection