@extends('layout.master')
@section('content')

<div class="container">
	<div class="row text-center" >
		<form action="{{route('categoryStore')}}" class="form-control" method="POST">
			@csrf

			<div class="col-md-8 ">
				<h1>Creat a Category</h1>
				<div class="row">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name">
				</div>

				<div class="row">
					<label for="">Description</label>
					<input type="text" class="form-control" name="description">
				</div>
				<br>
				<div class="row">
					<button class=" btn btn-primary">Create</button>
				</div>

			</div>
		</form>
	</div>
</div>

<br>
@stop