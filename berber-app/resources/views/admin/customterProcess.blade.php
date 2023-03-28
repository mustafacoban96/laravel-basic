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
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>1231231231</td>
            <td id="process-col">
                <a class="process-button" href="">update</a>
                <a class="process-button" href="">delete</a>
            </td>
          </tr>
      @endforeach
    </table>
</div>
<div class="paginate-button">
    {{ $users->links('vendor.pagination.custom') }}
</div>
{{-- @foreach ($users as $user)
        <p style="color:aliceblue">This is user: {{ $user->name }}</p>
    @endforeach --}}
@endsection



