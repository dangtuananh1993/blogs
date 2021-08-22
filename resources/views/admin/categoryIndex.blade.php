@extends('layout.master')

@section('content')
<br>
<div class="container">
  <div class="row">
    <div class="col-md-2 btn-ed">
      <a href="{{route('categoryCreate')}}" class="btn btn-primary">Create Category</a>
    </div>
  </div>
</div>
<br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col" class="col-md-3">NAME</th>
      <th scope="col" class="col-md-3">DESCRIPTION</th>
      <th scope="col" class="col-md-2">CREATED AT</th>
      <th scope="col" class="col-md-2">ACTION</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <th scope="row">{{$category->name}}</th>
      <th scope="row">{{$category->description}}</th>
      <th scope="row">{{$category->created_at}}</th>
      <th scope="row">
        <form action="{{route('categoryDelete', $category->id)}}" method="POST">
        @csrf
        @method('delete')
          <a href="{{route('categoryEdit', $category->id)}}" class="btn btn-primary ed-dl">Edit</a>
          <button type="sumit" class="btn btn-danger ed-dl">Delete</button>
        </form>
      </th>
    </tr>
    @endforeach
    
  </tbody>
</table>



@stop

