@extends('layouts.app')


@section('content')

<div class="card">
    <div class="card-header">Trashed Posts</div>
    <div class="card-body">

<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Restore</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

    @if($posts->count()>0)
    @foreach($posts as $post)
    <tr>
      <td><img src="{{$post->img}}" alt="Image" width="50px" height="50px"></td>
      <td>{{$post->title}}</td>
      <td><a href="{{Route('post.restore',['id'=>$post->id])}}" class="btn btn-success">Restore</a></td>
      <td><a href="{{Route('post.destroy',['id'=>$post->id])}}" class="btn btn-danger">X</a></td>
    </tr>
    @endforeach
    @else
    <tr>
      <th colspan="5" class="text-center">Trash is Empty</th>
    </tr>
    @endif
  </tbody>
</table>
</div>
</div>
</div>

@stop
