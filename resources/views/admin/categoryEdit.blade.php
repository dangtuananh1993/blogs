@extends('layout.master')
@section('content')

<div class="container">
	<div class="row text-center" >
		<form action="{{route('categoryUpdate', $category->id)}}" class="form-control" method="POST">
			@csrf
			@method('put')
			<div class="col-md-8 ">
				<h1>Creat a Category</h1>
				<div class="row">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name" value="{{$category->name}}">
				</div>

				<div class="row">
					<label for="">Description</label>
					<input type="text" class="form-control" name="description"value= "{{$category->description}}">
				</div>
				<br>
				<div class="row">
					<button class=" btn btn-primary">Update</button>
				</div>

			</div>
		</form>
	</div>
</div>

<br>
@stop