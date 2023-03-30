@extends('admin.adminPage')


@section('admin')
<h1 style="color:aliceblue">Add Employee</h1>

<div class="update-area">
    <form class="update-form" action="{{route('addEmploye')}}" method="POST">
        @csrf
        <div class="update">
            <label style="color: aliceblue; font-weight:bold" for="name">Username :</label>
            <input class="update-text" type="text" name ="name" placeholder="name">
        </div>
        <div class="update">
            <label style="color: aliceblue; font-weight:bold" for="email">Email :</label>
            <input class="update-text" type="text" name="email" placeholder="email">
        </div>
        <div class="update">
            <label style="color: aliceblue; font-weight:bold" for="phone">Phone :</label>
            <input class="update-text" type="text" name="phone" placeholder="phone">
        </div>
        <div class="update">
            <input class="update-text" type="password" name="password" placeholder="new password">
            <input class="update-text" type="password" name="password_confirmation" placeholder="confirm password">
        </div>
        <div class="update">
            <input class="update-button" type="submit" value="Add">
        </div>
    </form>
    @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="display:inline;color:aliceblue; font-weight:bold">{{ $error }}</p>
            @endforeach
    @endif
    @if(session('success'))
        <div class="success-area">
            {{session('success')}}
        </div>
    @endif
</div>
    
@endsection