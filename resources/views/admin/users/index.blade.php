@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">All Users</div>

    <div class="card-body">
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Permissions</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

    @foreach($users as $user)
    <tr>
      <td><img src="{{ asset($user->profile->avatar) }}" alt="Image" width="50px" height="50px" style="border-radius: 50%"></td>
      <td>{{$user->name}}</td>
      @if($user->admin)
        <td><a href="{{Route('user.not_admin',['id' => $user->id])}}" class="btn btn-xs btn-danger">Remove Admin</a></td>
      @else
        <td><a href="{{Route('user.admin',['id' => $user->id])}}" class="btn btn-success">Make Admin</a></td>
      @endif
      <td>
        @if(Auth::id()!==$user->id)
          <a href="{{Route('user.destroy', ['id' => $user->id])}}" class="btn btn-danger">X</a>
        @endif
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
</div>
</div>
</div>

@stop
