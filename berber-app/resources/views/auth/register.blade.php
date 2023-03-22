@extends('layouts.app')


@section('content')
<div class="register-box">
    <h1>Berberim</h1>
   
    <form action="{{route('register')}}" method="POST">
        @csrf
        <input type="text" id="username" name="username" placeholder="Username : name.surname" value="{{old('username')}}">
        @if ($errors->has('username'))
            <span class="text-danger">{{ $errors->first('username') }}</span>
        @endif
        <input type="email" id="email" name="email" placeholder="Email : example@email.com" value="{{old('email')}}">
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
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