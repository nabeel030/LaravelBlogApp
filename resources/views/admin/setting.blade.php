@extends('layouts.app')


@section('content')

<div class="card">
  <div class="card-header">
    Edit Setting
    </div>
    <div class="card-body">
      <form class="form-group" action="{{Route('setting.update')}}" method="post">
        {{csrf_field()}}
        <label for="setting">Site Name</label>
        <input type="text" class="form-control" name="site_name" value="{{$setting->site_name}}" required><br>
        <label for="setting">Contact Number</label>
        <input type="text" class="form-control" name="contact_number" value="{{$setting->contact_number}}" required><br>
        <label for="setting">Contact Email</label>
        <input type="email" class="form-control" name="contact_email" value="{{$setting->contact_email}}" required><br>
        <label for="setting">Address</label>
        <input type="text" class="form-control" name="address" value="{{$setting->address}}" required><br>
        <div class="text-center">
          <button type="submit" class="btn btn-outline-primary">Update</button>
        </div>
      </form>
    </div>
</div>
@endsection
