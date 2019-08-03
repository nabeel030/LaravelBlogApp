@extends('layouts.app')


@section('content')

<div class="card">
  <div class="card-header">
    Edit Tag
    </div>
    <div class="card-body">
      <form class="form-group" action="{{Route('tag.update',['id'=>$tags->id])}}" method="post">
        {{csrf_field()}}
        <label for="name">Tag Name</label>
        <input type="text" class="form-control" name="tag" value="{{$tags->tag}}" required><br>
        <div class="text-center">
          <button type="submit" class="btn btn-outline-primary">Update Tag</button>
        </div>
      </form>
    </div>
</div>

@stop
