@extends('layout.master')
@section('content')
<br>
<br>
<br>
<div class="container">
	<div class="jumbotron col-md-6">
  	<form action="{{route('savechangedpassword')}}" method="POST" >
  		@csrf
  		
  		<h1>Change Password</h1>
      	<BR></BR>
		  <div class="form-group">
		    <label >Password</label>
		    <input type="password" class="form-control" placeholder="Enter password" name="password">
		  </div><div class="form-group">
		    <label >New Password</label>
		    <input type="password" class="form-control" placeholder="Enter new password" name="newpassword">
		  </div>
		  @error('password')
			<p class="text-danger">{{$message}}</p>
			@enderror
		  <div class="form-group">
		    <label >Re-type New Password</label>
		    <input type="password" class="form-control" placeholder="Re-type new password" name="newrepassword">
		  </div>
		  @error('repassword')
			<p class="text-danger">{{$message}}</p>
			@enderror
		  <div>
		  	<input type="hidden" name="email" value="{{$email}}">
		  </div>
		  <div>
		  	<input type="hidden" name="token" value="{{$token}}">
		  </div>
		  <div class="">
		  	<button type="submit" class="btn btn-primary">Submit</button>
		  </div>
		  <br>
		  @if(Session::get('error'))
				 <div class="alert alert-danger">
				  	{{Session::get('error')}}
				 </div>	
				 @endif

	</form>
</div>
</div>

<br>
<br>

@stop