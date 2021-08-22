@extends('layout.master')
@section('content')
<br>
<br>
<br>
<div class="container">
	<div class="jumbotron col-md-6">
  	<form action="{{route('savenewpassword')}}" method="POST" >
  		@csrf
  		@method('put')
  		<h1>Reset Password</h1>
      	<BR></BR>
		  <div class="form-group">
		    <label >Password</label>
		    <input type="password" class="form-control" id="" a placeholder="Enter new password" name="password">
		  </div>
		  @error('password')
			<p class="text-danger">{{$message}}</p>
			@enderror
		  <div class="form-group">
		    <label >Re-type Password</label>
		    <input type="password" class="form-control" id="" a placeholder="Re-type new password" name="repassword">
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