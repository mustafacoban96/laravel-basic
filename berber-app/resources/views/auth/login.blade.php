@extends('layouts.app')


@section('content')
<div class="login-box">
    <h1>Berberim</h1>
    <form action="{{route('login')}}" method='POST'>
        @csrf
        <input type="email" id="email" name="email" placeholder="Email : example@email.com" required>
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <input type="password" id="password" name="password" placeholder="Password" required>
        @if ($errors->any())
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
            <div class="login-options">
                <label class="check-area"><input type="checkbox" name="checkbox" />Remember me</label>
                <label class="forgot-password" for="forgot"><a class="forgot-password-link" href="">Forgot Password</a></label>
            </div>
        <input type="submit" value="Login">
    </form>
</div>
@endsection