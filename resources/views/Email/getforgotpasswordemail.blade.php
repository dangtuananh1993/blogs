@extends('layout.master')
@section('content')
<br>
<br>
<br>
<div class="container">
	<div class="jumbotron col-md-6">
  	<form action="{{route('getverifycode')}}" method="POST" >
  	@csrf
  		<h1>Forget Password</h1>
      	<BR></BR>
		<div class="form-group">
		    <label >Email address</label>
		    <input type="email" class="form-control" id="" a placeholder="Enter email" name="email">
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
		@if(Session::get('success'))
		<div class="alert alert-success">
			{{Session::get('success')}}
		</div>	
		@endif
	</form>
</div>
</div>

<br>
<br>

@stop