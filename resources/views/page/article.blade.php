@extends('page.masterpage')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="col-md-12 article-title" >
				<h1>{{$article->title}}</h1>
			</div>
			<div class="col-md-12 article-description">
				<h1>{{$article->description}}</h1>
			</div>
			<div class="col-md-12 article-created-at">
				<h1>{{$article->created_at}}</h1>
			</div>
			<div class="col-md-12 article-tag">
				@foreach($article->tag as $tag)
					<a class=""href="{{route('tag',$tag->slug)}}">#{{$tag->slug}}</a>
				@endforeach
			</div>
			<div class="col-md-12">
				<img src="{{$article->getThumnail()}}"class="img-fluid" alt="">
			</div>
			<div class="col-md-12 article-content">
				{!!$article->content!!}
			</div>
			
			<div class="col-md-12">
				<form class=""action="{{route('comment')}}" method="POST">
					@csrf
					<label for="">Comment</label>
					<input type="hidden" name="post_id" class="text_post_id" value="{{$article->id}}">
					<input type="hidden" name="slug" class="text_post_id" value="{{$article->slug}}">
					
					@foreach($comments as $comment)
					@if($article->id==$comment->post_id)
					@if($comment->user)
					<div>
						<h1>{{$comment->user->name}}:</h1>
					</div>
					<div class="">
							<p>{{$comment->comment}}</p>
							<p>{{$comment->created_at}}</p>
					</div>
					@endif
					@endif
					@endforeach
					@if(!Auth::check())
					<div>
						<a href="{{route('login')}}"><p>Đăng nhập để viết bình luận</p></a>
					</div>
					@endif
					@if(Auth::check())
					<textarea class="form-control" row="2"name="comment"></textarea>
					<br>
					<div class="">
						<button type ="submit"class="btn btn-primary">
							Comment
						</button>
					</div>
					@endif
				</form>
			</div>
			
		</div>
		<div class="col-md-3">
			<DIV>
				ADVERTISEMENT
			</DIV>
		</div>
	</div>
</div>
<br>
@stop