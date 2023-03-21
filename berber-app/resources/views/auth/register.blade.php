@extends('layouts.app')


@section('content')
<div class="register-box">
    <h1>Berberim</h1>
    <form>
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="email" id="email" name="email" placeholder="Email : example@gmail.com" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm password" required>
        <input type="submit" value="Register">
    </form>
</div>
@endsection