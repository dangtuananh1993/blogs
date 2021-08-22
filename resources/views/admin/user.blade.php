@extends('layout.master')

@section('content')
<br>
<div class="container">
  {{-- <div class="row">
    <div class="col-md-2 btn-ed">
      <a href="" class="btn btn-primary">Create Tag</a>
    </div>
  </div> --}}
</div>
<br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col" class="col-md-2">NAME</th>
      <th scope="col" class="col-md-2">EMAIL</th>
      <th scope="col" class="col-md-2">ADDRESS</th>
      <th scope="col" class="col-md-4">BIO</th>
      <th scope="col" class="">GENDER</th>
      <th scope="col" class="">TYPE</th>
      <th scope="col" class="">ACTION</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <th scope="row">{{$user->name}}</th>
      <th scope="row">{{$user->email}}</th>
      <th scope="row">{{$user->address}}</th>
      <th scope="row">{{$user->bio}}</th>
      <th scope="row">{{$user->gender}}</th>
      <th scope="row">{{$user->type}}</th>
      <th scope="row">
          <a href="{{route('useredit', $user->id)}}" class="btn btn-primary ed-dl">Edit</a>
      </th>
    </tr>
    @endforeach
    
    
  </tbody>
</table>



@stop

