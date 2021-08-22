@extends('layout.master')
@section('content')
<br>
<br>
<br>
<div class="container">
	<div class="jumbotron col-md-6">
  	<form action="{{route('verifyaccount')}}" method="POST" >
  	@csrf
  		<h5>Vui lòng click vào nút Submit để xác thực tài khoản</h5>
      	<br>
		<div class="form-group">
		    
		    <input type="hidden"   name="email" value="{{$email}}">
		</div>
		<div class="form-group">
		    
		    <input type="hidden"   name="token" value="{{$token}}">
		</div>
		<div class="">
		  	<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<br>
		
	</form>
</div>
</div>

<br>
<br>

@stop