@extends('layout.master')
@section('content')

<div class="container">
	<div class="row text-center" >
		<form action="{{route('postUpdate', $post->id)}}" class="form-control" method="POST" enctype="multipart/form-data">
			@csrf
			@method('put')
			<div class="col-md-12 ">
			<h1>Creat a Post</h1>
			<div class="row">
				<label for="">Title</label>
				<input type="text" class="form-control" name="title" value="{{old('title',$post->title)}}">
				@error('title')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>

			<div class="row">
				<label for="">Description</label>
				<input type="text" class="form-control" name="description" value="{{old('description',$post->description)}}">
				@error('description')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>

			<div class="row">
				<label for="">Content</label>
				<div class="col-md-12">
					<textarea name="content" id="editor1" cols="30" rows="10" class="form-control">{{old('content',$post->content)}}"</textarea>
				</div>
				@error('content')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>	

			<div class="row">
				<label for="">Category</label>
				
				<select  class="form-control" id="" name ="category">
					<option value="">Chọn danh mục</option>
					@foreach($categories as $category)
		      			<option value="{{$category->id}}" {{old('category',$post->category_id == $category->id) ? 'selected':''}}>
		      				{{$category->name}}
		      			</option>
		     		@endforeach
		    	</select>
		    	@error('category')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>
			@php
				$tags_id=old('tag',$post->tag()->pluck('tags.id')->toArray());
			@endphp
			<div class="row form-group">
				<label for="">Tag</label>
				 <select  multiple="multiple" class="form-control select2" name="tag[]" >
				 @foreach($tags as $tag)
			      	<option value="{{$tag->id}}" {{in_array($tag->id,$tags_id) ? 'selected':''}}>{{$tag->name}}</option>
			      @endforeach
			    </select> 
			</div>
			<div class="form-group">
		        <label >Oustanding</label>
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="outstanding" value="1" checked>
		          <label class="form-check-label">No</label>
		        </div>
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="outstanding" value="2" {{$post->outstanding==2?'checked':''}}>
		          <label class="form-check-label">Yes</label>
		        </div>
	        </div>

	        <div class="form-group">
		        <label >Status</label>
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="status" value="1" checked>
		          <label class="form-check-label">Checking</label>
		        </div>
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="status" value="2" {{$post->status==2?'checked':''}}>
		          <label class="form-check-label">Approved</label>
		        </div>
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="status" value="3" {{$post->status==3?'checked':''}}>
		          <label class="form-check-label">Rejected</label>
		        </div>
	        </div>

	        <div class="form-control">
	        	<input type="file" name='thumnail' value="{{$post->thumnail}}">
	        	<img src="{{'/img/'.$post->thumnail}}" width="200"  alt="">
	        </div>

	        
			<br>
			<div class="row">
				<button class=" btn btn-primary">Update</button>
			</div>

		</div>
		</form>
	</div>
</div>
	<script type="" src="/ckeditor/ckeditor.js"></script>
	<script>
        CKEDITOR.replace('editor1');
    </script>

<br>
@stop