@extends('layout.master')

@section('content')
<br>
<br>
<div class="container-fluid">
 <form action="">
    <div class="row">
    <div class="row container col-md-12">
      <div class="col-md-4">
        <input type="text" class="form-control" name="keyword" placeholder="Nhập từ cần tìm kiếm trong bài viết"value={{request()->input('keyword')}}>
      </div>
      <div class="col-md-2">
        <select  class="form-control " id="" name ="category_id">
          <option value="">Chọn danh mục</option>
          @foreach($categories as $category)
               {{--  Kiểm tra xem có giá trị người dùng đã nhập vào hay không, nếu có thì lưu lại sau khi tìm kiếm để người dùng không phải nhập lại và khi ấn vào trang sau không bị mất giá trị bằng thuộc tính selected--}}
                <option value="{{$category->id}} " {{request()->input('category_id') == $category->id ? 'selected':''}}>{{$category->name}}</option>
            @endforeach
        </select>
      </div>
      <div class="col-md-2">
        <select  class="form-control " id="" name ="status">
          <option value="">Status</option>
          {{-- @foreach($categories as $category) --}}
               {{--  Kiểm tra xem có giá trị người dùng đã nhập vào hay không, nếu có thì lưu lại sau khi tìm kiếm để người dùng không phải nhập lại và khi ấn vào trang sau không bị mất giá trị bằng thuộc tính selected--}}
          <option value="1" {{request()->input('status')==1 ? 'selected':''}}>Checking</option>
          <option value="2" {{request()->input('status')==2 ? 'selected':''}}>Approved</option>
          <option value="3" {{request()->input('status')==3?'selected':''}}>Rejected</option>
            {{-- @endforeach --}}
        </select>
      </div>
      <div class="col-md-4">
        
         <select  multiple="multiple" class="form-control select2 " name="tagsId[]">
         @foreach($tags as $tag)
              {{-- Kiểm tra xem nếu vó giá trị người dùng nhập vào thì lưu sẵn..... --}}
              <option value="{{$tag->id}}" {{in_array($tag->id,   request()->input('tagsId',[])) ? 'selected':''}}>{{$tag->name}}</option>
            @endforeach
          </select>
      </div>
    </div>
    {{-- <div class="col-md-12"> 
        <input type="hidden" name="user_id" value={{$user_id}}>
    </div>  --}} 
    <br>
    <div class="col-md-2">
          <button class="form-control btn btn-primary" type="submit">Search</button>
      </div>
    <br>  
    
  </div>
 </form>
</div>
<br>
<div class="container-fluid">
  <div class="col-md-2">
      <a href="{{route('postCreate')}}" class="btn btn-primary">Create Post</a>
    </div>
</div>
<br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col" class="col-md-4">TITLE</th>
      <th scope="col">CREATED AT</th>
      <th scope="col" class="col-md-2">TAG</th>
      <th scope="col" class="col-md-1">CATEGORY</th>
      <th scope="col" class="col-md-1">IMAGE</th>
      <th scope="col" class="col-md-1">STATUS</th>
      <th scope="col" class="col-md-1">ACTION</th>
    </tr>
  </thead>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <th scope="row">{{$post->title}}</th>
      <th scope="row">{{$post->created_at}}</th>
      <th scope="row">
        <ul>
          {{-- Phải đếm xem bài post có tag k thì mới in ra, nếu không sẽ lỗi --}}
          @if($post->tag()->count())
          @foreach($post->tag as $tag)
            <li>{{$tag->name}}</li>
          @endforeach
        @endif
        </ul>

      </th>
      <th scope="row">
        <ul>
        <li>
          {{-- Phải check xem bài post có category k thì mới in ra, nếu không sẽ lỗi --}}
          @if($post->categories)
            {{$post->categories->name}}
          @endif
        </li>
      </ul>
      </th>
      <th>
        <img src="{{$post->getThumnail()}}" class="img-fluid " alt="">
      </th>
      <TH> <li>{{$post->getStrStatus()}}</li>
          
      </TH>
      <th scope="row">
        <form action="{{route('postDelete', $post->id)}}" method="POST">
        @csrf
        @method('delete')
          <a href="{{route('postEdit', $post->id)}}" class="btn btn-primary ed-dl">Edit</a>
          <button type="sumit" class="btn btn-danger ed-dl">Delete</button>
        </form>
      </th>
    </tr>
    @endforeach
    
  </tbody>
</table>

{{$posts->appends(request()->all())->render()}}



@stop

