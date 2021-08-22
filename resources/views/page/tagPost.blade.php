@extends('page.masterpage')
@section('content')
    <main>
        <div class="container text-center">
            <br>
            <img src="/img/banner-ad-example-online.png" class="img-fluid adv-banner" alt="">
            <br>
        </div>
        <div class="container ">
            <br>
            <H1><a href=""></a> <a href=""> </a></H1>
            <br>
        </div>
        <div class="container"> 
            <div class="row col-md-12">   
                <div class="col-md-9"> 
                    <div class="container">
                        @foreach($posts as $post)
                        <div class="row ">
                            <div class="col-md-4">
                                <a href="{{route('article',$post->slug)}}"><img src="{{$post->getThumnail()}}" class="img-fluid second-outstanding" alt=""></a>
                            </div>
                            <div class="col-md-8">
                              <a href="{{route('article',$post->slug)}}"> <h1>{{$post->title}}</h1></a>
                            </div>
                        </div>
                        @endforeach
                        <br>
                        {{$posts->appends(request()->all())->render()}}
                        {{-- <div class="row ">
                            <div class="col-md-4">
                                <img src="/assets/img/trending/trending_bottom1.jpg" alt="">
                            </div>
                            <div class="col-md-8">
                                <h5>abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds</h5>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <img src="/assets/img/trending/trending_bottom1.jpg" alt="">
                            </div>
                            <div class="col-md-8">
                                <h5>abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds</h5>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <img src="/assets/img/trending/trending_bottom1.jpg" alt="">
                            </div>
                            <div class="col-md-8">
                                <h5>abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds</h5>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <img src="/assets/img/trending/trending_bottom1.jpg" alt="">
                            </div>
                            <div class="col-md-8">
                                <h5>abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds</h5>
                            </div>
                        </div> --}}
                    </div>    
                </div>
                <div class="col-md-3">  
                       <div>
                            <a href=""><h5>abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds </h5></a>
                       </div> 
                       <div>
                            <a href=""><h5>abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds </h5></a>
                       </div> 
                       <div>
                            <a href=""><h5>abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds </h5></a>
                       </div> 
                       <div>
                            <a href=""><h5>abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds </h5></a>
                       </div> 
                       <div>
                            <a href=""><h5>abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds </h5></a>
                       </div> 
                       <div>
                            <a href=""><h5>abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds </h5></a>
                       </div> 
                       <div>
                            <a href=""><h5>abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds abc adf dff sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf sdf fds </h5></a>
                       </div> 
                       
                </div>      
            </div>  
        </div>  
        
    </main>
    
@stop