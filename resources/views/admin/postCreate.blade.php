@extends('layout.master')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container">
	<div class="row text-center" >
		<form action="{{route('postStore')}}" class="form-control" method="POST" enctype="multipart/form-data">
			@csrf

			<div class="col-md-12 ">
			<h1>Creat a Post</h1>
			<div class="row">
				<label for="">Title</label>
				<input type="text" class="form-control" name="title" value="{{old('title')}}">
				@error('title')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>

			<div class="row">
				<label for="">Description</label>
				<input type="text" class="form-control" name="description" value="{{old('description')}}">
				@error('description')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>

			<div class="row" >
				<label for="">Content</label>
				
				<div class="col-md-12">
					<textarea name="content"  cols="30" rows="10" class="form-control" id="editor1">{{old('content')}}</textarea>
				</div>
				@error('content')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>	

			<div class="row">
				<label for="">Category</label>
				
				<select  class="form-control " id="" name ="category">
					<option value="">Chọn danh mục</option>
					@foreach($categories as $category)
		      			<option value="{{$category->id}}" {{old('category')==$category->id?'selected':''}}>{{$category->name}}</option>
		     		@endforeach
		    	</select>
		    	@error('category')
				<p class="text-danger">{{$message}}</p>
				@enderror
		    
			</div>
			<?php
				$tags_id= old('tag',[]);
			?>
			<div class="row form-group">
				<label for="">Tag</label>
				 <select  multiple="multiple" class="form-control select2" name="tag[]">
				 @foreach($tags as $tag)
			      	<option value="{{$tag->id}} "{{in_array($tag->id,$tags_id)?'selected':''}} >{{$tag->name}}</option>
			      @endforeach
			    </select> 
			</div>
			<div class="form-control">
		        <label >Oustanding</label>
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="outstanding" value="1" checked>
		          <label class="form-check-label">No</label>
		        </div>
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="outstanding" value="2" >
		          <label class="form-check-label">Yes</label>
		        </div>
	        </div>
	        <br>
	        <div class="form-control">
		        <label >Status</label>
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="status" value="1" checked>
		          <label class="form-check-label">Checking</label>
		        </div>
		        
	        </div>
	        <div class="form-control">
	        	<input type="file" name="thumnail">
	        	@error('thumnail')
				<p class="text-danger">{{$message}}</p>
				@enderror
	        </div>
	        
			<br>
			<div class="row">
				<button type ="submit" class=" btn btn-primary">
				Create
			</button>
			</div>

		</div>
		</form>
	</div>
</div>

	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	  <script >
	    $(document).ready(function() {
	        $('.select2').select2();
	    });
	 	</script>
	<script type="" src="/ckeditor/ckeditor.js"></script>
	<script>
        CKEDITOR.replace('editor1');
    </script>
<br>
@stop