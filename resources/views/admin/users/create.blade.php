@extends('layouts.app')


@section('content')

<div class="card">
  <div class="card-header">
    Add New User
    </div>
    <div class="card-body">
      <form class="form-group" action="{{Route('user.store')}}" method="post">
        {{csrf_field()}}
        <label for="tag">User Name</label>
        <input type="text" class="form-control" name="username" value="" required><br>
        <label for="tag">Email</label>
        <input type="email" class="form-control" name="email" value="" required><br>
        <div class="text-center">
          <button type="submit" class="btn btn-outline-primary">Store User</button>
        </div>
      </form>
    </div>
</div>

@stop
