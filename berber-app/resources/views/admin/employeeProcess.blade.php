@extends('admin.adminPage')




@section('admin')
<div class="table-container">
    <table>
        <caption>Customer Information</caption>
        <tr>
            <th id="id-col">Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th id="process-col">Process</th>
        </tr>
      @foreach ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>
                {{$user->name}}
            </td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td id="process-col">
                <a class="process-button" href="edit/{{$user->id}}">edit</a>
                <a class="process-button" href="delete/{{$user->id}}">delete</a>
            </td>
          </tr>
      @endforeach
    </table>
</div>
<div class="add-employee">
    <a class="process-button" id="add" href="{{route('employeeCreatePage')}}">add</a>
</div>
@if(session('success'))
    <div class="success-area">
        {{session('success')}}
    </div>
@endif

<div class="paginate-button">
    {{ $users->links('vendor.pagination.custom') }}
</div>

@endsection