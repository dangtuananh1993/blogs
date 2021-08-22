@extends('layout.master')
@section('content')
<br>
<div class="container">
	<div class="row " >
		<form action="{{route('userupdate', $user->id)}}" class="form-control" method="POST">
			@csrf
			@method('put')
			<div class="form-group">
		        <label >User 's Type</label>

		        @foreach($roles as $role)
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="type" value="{{$role->id}}"  {{$role->id==$user->type?'checked' :''}} >
		          <label class="form-check-label"  >
		            {{$role->role}}
		          </label>
	        	</div>
	        	@endforeach
	        </div>
	        

	        <button type="submit" class="btn btn-primary">Change</button>
        
		</form>
	</div>
</div>

<br>
@stop