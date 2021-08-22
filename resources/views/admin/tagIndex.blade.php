@extends('layout.master')

@section('content')
<br>
<div class="container">
  <div class="row">
    <div class="col-md-2 btn-ed">
      <a href="{{route('tagCreate')}}" class="btn btn-primary">Create Tag</a>
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
    @foreach($tags as $tag)
    <tr>
      <th scope="row">{{$tag->id}}</th>
      <th scope="row">{{$tag->name}}</th>
      <th scope="row">{{$tag->description}}</th>
      <th scope="row">{{$tag->created_at}}</th>
      <th scope="row">
        <form action="{{route('tagDelete', $tag->id)}}" method="POST">
        @csrf
        @method('delete')
          <a href="{{route('tagEdit', $tag->id)}}" class="btn btn-primary ed-dl">Edit</a>
          @can('tag-delete')
          <button type="sumit" class="btn btn-danger ed-dl">Delete</button>
          @endcan
        </form>
      </th>
    </tr>
    @endforeach
    
  </tbody>
</table>



@stop

