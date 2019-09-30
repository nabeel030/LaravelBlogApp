@extends('layouts.app')


@section('content')

<div class="card">
  <div class="card-header">
    Create New Category
    </div>
    <div class="card-body">
      <form class="form-group" action="{{Route('category.store')}}" method="post">
        {{csrf_field()}}
        <label for="name">Category Name</label>
        <input type="text" class="form-control" name="name"><br>
        <div class="text-center">
          <button type="submit" class="btn btn-outline-primary">Store Category</button>
        </div>
      </form>
    </div>
</div>

@endsection
