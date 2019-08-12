@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-lg-12">
  <div class="card-header" style="background: violet">
    <h4>Dashboard</h4>
  </div>
</div>
</div>
<br>

<div class="row">
  <div class="col-lg-3">
    <div class="card" style="border: 2px solid powderblue">
        <div class="card-header text-center" style="background: powderblue">Published Posts</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <h2 class="text-center">{{$posts}}</h2>

        </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card" style="border: 2px solid red">
        <div class="card-header text-center" style="background: red">Trashed Posts</div>

        <div class="card-body">
            <h2 class="text-center">{{$trashed}}</h2>
        </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card" style="border: 2px solid green">
        <div class="card-header text-center" style="background: green">Users</div>
        <div class="card-body">
            <h2 class="text-center">{{$users}}</h2>
        </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card" style="border: 2px solid pink">
        <div class="card-header text-center" style="background: pink">Categories</div>
        <div class="card-body">
            <h2 class="text-center">{{$categories}}</h2>
        </div>
    </div>
  </div>

</div>



@endsection
