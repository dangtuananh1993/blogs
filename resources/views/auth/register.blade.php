@extends('layout.master')
@section('content')
<br>
<br>
<br>
<div class="container">
  <div class="jumbotron col-md-8">
    <form action="{{route('register')}}" method="POST" >
      @csrf
      <h1>REGISTER</h1>
      <BR></BR>
      <div class="form-group">
        <label >Name</label>
        <input type="text" class="form-control" id="" a placeholder="Enter your name" name="name" value="{{old('name')}}">
        @error('name')
          <p class="text-danger">{{$message}}</p>
        @enderror
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div><div class="form-group">
        <label >Email address</label>
        <input type="text" class="form-control" id="" a placeholder="Enter email" name="email" value="{{old('email')}}">
        @error('email')
          <p class="text-danger">{{$message}}</p>
        @enderror
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label >Password</label>
        <input type="password" class="form-control"  placeholder="Password" name="password">
        @error('password')
          <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label >Re-type Password</label>
        <input type="password" class="form-control"  placeholder="Re-type Password" name="repassword">
        @error('repassword')
          <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label >Address</label>
        <input type="text" class="form-control" id="" a placeholder="Enter email" name="address" value="{{old('address')}}">
        @error('address')
          <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label >Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" value="1" checked {{old('gender')==1?'checked':''}} >
          <label class="form-check-label"  >
            Nam
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender"   value="2" {{old('gender')==2?'checked':''}}>
          <label class="form-check-label">
            Nữ
          </label>
          @error('gender')
          <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="form-group">
          <label >Bio</label>
          <textarea name="bio" id="" cols="30" rows="4" class="form-control">{{old('bio')}}</textarea>
          @error('bio')
          <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="form-group">
          <label >Type</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" value="1" checked >
          <label class="form-check-label"  >
              User
          </label>
          @error('type')
            <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <input type="hidden" value="1" name="active_user">
        </div>
          
      </div>

      <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>
</div>

<br>
<br>

@stop