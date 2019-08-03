@extends('layouts.app')


@section('content')

@if(count($errors)>0)

<ul class="list-group">
  @foreach($errors->all() as $err)
      <li class="list-group-item text-danger">
        {{$err}}
      </li>
  @endforeach
</ul>

@endif

<div class="card">
  <div class="card-header">
    User Profile
    </div>
    <div class="card-body">
      <form class="form-group" action="{{Route('profile.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <label for="tag">User Name</label>
        <input type="text" class="form-control" name="username" value="{{$user->name}}" required><br>
        <label for="tag">Email</label>
        <input type="email" class="form-control" name="email" value="{{$user->email}}" required><br>
        <label for="tag">New Password</label>
        <input type="password" class="form-control" name="password" value=""><br>
        <label for="img">Upload Avatar</label>
        <input type="file" class="form-control" name="img" value=""><br>
        <label for="tag">Facebook</label>
        <input type="text" class="form-control" name="facebook" value="{{$user->profile->facebook}}"><br>
        <label for="tag">Youtube</label>
        <input type="text" class="form-control" name="youtube" value="{{$user->profile->youtube}}"><br>
        <label for="tag">About You</label>
        <textarea name="about" rows="6" cols="95">{{$user->profile->about}}</textarea><br>

        <div class="text-center">
          <button type="submit" class="btn btn-outline-primary">Save Changes</button>
        </div>
      </form>
    </div>
</div>

@stop
