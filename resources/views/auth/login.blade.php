@extends('layout.master')
@section('content')
<br>
<br>
<br>
<div class="container">
	<div class="jumbotron col-md-6">
  	<form action="{{route('login')}}" method="POST" >
  		@csrf
  		<h1>LOG IN</h1>
      	<BR></BR>
		  <div class="form-group">
		    <label >Email address</label>
		    <input type="email" class="form-control" id="" a placeholder="Enter email" name="email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label >Password</label>
		    <input type="password" class="form-control"  placeholder="Password" name="password">
		  </div>
		  
		  <div class="">
		  	<button type="submit" class="btn btn-primary">Log In</button>
		  </div>
		  <br>
		  <div class="form-group">
		  	<a href="{{route('getforgotpasswordemail')}}">Quên mật khẩu?</a>
		  </div>
		  <br>
		  <div class="form-group ">
				@if(Session::get('success'))	
				<div class="alert alert-success">
				  	{{Session::get('success')}}
				 </div>
				@endif
				@if(Session::get('error'))
				 <div class="alert alert-danger">
				  	{{Session::get('error')}}
				 </div>	
				 @endif
		</div>
	</form>
</div>
</div>

<br>
<br>

@stop