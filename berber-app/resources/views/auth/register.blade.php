@extends('layouts.app')


@section('content')
<div class="register-box">
    <h1>Berberim</h1>
   
    <form action="{{route('register')}}" method="POST">
        @csrf

        <input type="text" id="name" name="name" placeholder="name : name.surname" value="{{old('name')}}">
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif

        <input type="email" id="email" name="email" placeholder="Email : example@email.com" value="{{old('email')}}">
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif

        <input type="text" id="phone" name="phone" placeholder="phone:05558887964" value="{{old('phone')}}">
        @if ($errors->has('phone'))
            <span class="text-danger">{{ $errors->first('phone') }}</span>
        @endif


        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
        @error('password')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password">
        <input type="submit" value="Register">
    </form>
    
</div>
@endsection