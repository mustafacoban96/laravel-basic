@extends('layouts.app')


@section('content')
<div class="login-box">
    <h1>Berberim</h1>
    <form>
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="email" id="email" name="email" placeholder="Email : example@gmail.com" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <label class="check-area"><input type="checkbox" name="checkbox" />Remember me</label>
        <input type="submit" value="Login">
        
    </form>
</div>
@endsection