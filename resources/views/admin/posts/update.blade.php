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
    Update Post
    </div>
    <div class="card-body">
      <form class="form-group" action="{{Route('post.update',['id'=>$posts->id])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{$posts->title}}" required><br>
        <label for="img">Upload Image</label>
        <input type="file" class="form-control" name="img" value=""><br>
        <label for="category_id">Select Category</label>
        <select class="form-control" name="category_id">
          @foreach($category as $cat)
              <option value="{{$cat->id}}" @if($posts->category->id == $cat->id) seleted
                 @endif>
                 {{$cat->name}}
              </option>
          @endforeach
        </select><br>
        <label>Select Tags</label>
        @foreach($tags as $tag)
          <div class="checkbox">
            <label for="tags">
              <input type="checkbox" name="tags[]" value="{{$tag->id}}"
                @foreach($posts->tags as $pt)
                  @if($tag->id == $pt->id)
                    checked
                  @endif
                @endforeach
                >
                {{$tag->tag}}
            </label>
          </div>
        @endforeach
        <label for="content">Content</label><br>
        <textarea name="content" rows="6" cols="95">{{$posts->content}}</textarea>
        <div class="text-center">
          <button type="submit" class="btn btn-outline-primary">Update Post</button>
        </div>
      </form>
    </div>
</div>

@stop
