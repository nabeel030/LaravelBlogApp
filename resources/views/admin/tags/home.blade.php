@extends('layouts.app')


@section('content')

<div class="card">
    <div class="card-header">Tags</div>

    <div class="card-body">

<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Tag Name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

    @if($tags->count()>0)
    @foreach($tags as $tag)
    <tr>
      <td>{{$tag->tag}}</td>
      <td><a href="{{Route('tag.edit',['id'=>$tag->id])}}" class="btn btn-success">Update</a></td>
      <td><a href="{{Route('tag.delete',['id'=>$tag->id])}}" class="btn btn-danger">X</a></td>
    </tr>
    @endforeach
    @else
    <tr>
      <th colspan="5" class="text-center">No Tags Yet</th>
    </tr>
    @endif
  </tbody>
</table>
</div>
</div>
</div>

@stop
