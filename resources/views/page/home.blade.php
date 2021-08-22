@extends('page.masterpage')
@section('content')
    <main>
        {{-- Phần quảng cáo --}}
        <div class="container ">
            <img src="/img/banner-ad-example-online.png" class="img-fluid adv-banner" alt="">
            <br>
        </div>
        {{-- Hết phần quảng cáo --}}
        {{-- Phần tin nổi bật --}}
        <div class="container">
            <div class="row col-md-12">
                <div class="left-oustanding col-md-9 right-outstanding">
                    <div class="row col-md-12">
                        <?php
                        $post1 = $post9->shift(1);
                        $post3 = $post9->shift(3);
                        ?>
                        <div class="row col-md-12 outstanding1">
                            <a href="{{route('article',$post1->slug)}}"><img src="{{$post1->getThumnail()}}"class="img-fluid first-outstanding" alt=""></a>
                            <h1><a href="{{route('article',$post1->slug)}}">{{$post1->title}}</a></h1>
                        </div>
                    </div>
                    <div class="row col-md-12 outstanding1-bt"  >
                        @foreach($post3 as $post3)
                        <div class="col-md-4 outstanding2">
                            <a href="{{route('article',$post3->slug)}}"><img src="{{$post3->getThumnail()}}" class="img-fluid second-outstanding" alt=""></a>
                            <h2><a href="{{route('article',$post3->slug)}}">{{$post3->title}}</a></h2>
                        </div>
                        @endforeach
                        {{-- <div class="col-md-4 outstanding2">
                            <img src="assets/img/trending/trending_bottom2.jpg" alt="">
                            <h2>3 kkkkkkkk kkkk33 sdf dfas fdsa fds fdsaf dsaf dsaf</h2>
                        </div>
                        <div class="col-md-4 outstanding2">
                            <img src="assets/img/trending/trending_bottom2.jpg" alt="">
                            <h2>4 kkkkkkk kkkk33 sdf dfas fdsa fds fdsaf dsaf dsaf </h2>
                        </div> --}}
                    </div> 
                </div>
                <div class="right-oustanding col-md-3">
                    @foreach($post9->all() as $post)
                    <div class="row right-outstanding-line">
                        <div class="col-md-6">
                            <a href="{{route('article',$post->slug)}}"><img src="{{$post->getThumnail()}}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="col-md-6 text-right-outstanding-line">
                            <h5><a href="{{route('article',$post->slug)}}">{{Str::limit($post->title,50)}}</a></h5>
                        </div>
                        <hr  width="80%" align="center" />
                    </div>
                    @endforeach
                {{-- <div class="row">
                    <div class="col-md-6">
                        <img src="assets/img/trending/right1.jpg" alt="">
                    </div>
                    <div class="col-md-6">
                        <h5><a href="">kkkkkkkkkkk sdf dfas fdsa fds fdsaf dsaf dsaf dsaf sdaf dsaf sdaf sdafk</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/img/trending/right1.jpg" alt="">
                    </div>
                    <div class="col-md-6">
                        <h5><a href="">kkkkkkkkkkk sdf dfas fdsa fds fdsaf dsaf dsaf dsaf sdaf dsaf sdaf sdafk</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/img/trending/right1.jpg" alt="">
                    </div>
                    <div class="col-md-6">
                        <h5><a href="">kkkkkkkkkkk sdf dfas fdsa fds fdsaf dsaf dsaf dsaf sdaf dsaf sdaf sdafk</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/img/trending/right1.jpg" alt="">
                    </div>
                    <div class="col-md-6">
                        <h5><a href="">kkkkkkkkkkk sdf dfas fdsa fds fdsaf dsaf dsaf dsaf sdaf dsaf sdaf sdafk</a></h5>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- Hết phần tin nổi bật --}}

        {{-- Phần danh mục --}}
        <div class="container">
            <div class="row colmd-12">
                <div class="left-oustanding col-md-9 ">
                    @foreach($categories as $category)
                    @if(count($category->posts)>0)
                    <div><br></div>
                    <div class="row col-md-12">
                        <div class="row col-md-12 category">
                            <div class="col-md-2 btn btn-danger">
                                <a href="{{route('category', $category->slug)}}">{{$category->name}}</a>
                            </div>
                        </div>
                        <hr  width="100%" align="center" />
                        <?php
                            $postCt=$category->posts ->sortByDesc('id')->where('status',2)->take(9);
                        ?>
                        <div class="row col-md-12" >
                            @foreach($postCt as $postct)
                            <div class="col-md-4 category-6" >
                                <div class="row">
                                    <a href="{{route('article',$postct->slug)}}"><img src="{{$postct->getThumnail()}}" class="img-category-6 img-fluid" alt=""></a>
                                </div>
                                <div class="row text-category-6">
                                    <h4 class=""><a href="{{route('article',$postct->slug)}}">{{$postct->title}}</a></h4>
                                </div>
                            </div>
                            @endforeach

                            
                            {{-- <div class="col-md-4">
                                <div class="row">
                                    <img src="assets/img/trending/trending_bottom1.jpg" alt="">
                                </div>
                                <div class="row">
                                    <h4>bài 1</h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <img src="assets/img/trending/trending_bottom1.jpg" alt="">
                                </div>
                                <div class="row">
                                    <h4>bài 1</h4>
                                </div>
                            </div> --}}
                        </div>
                        
                        
                    </div>
                    @endif
                    @endforeach
                </div>
                
                <div class="right-oustanding col-md-3">
                    <div class="row">
                        <h3 class="home-top-new-week">TOP WEEK NEWS</h3>
                    </div>
                    @foreach($postktns as $post5)
                    <div class="row home-top-new-week-li">
                        <h1>
                            <a href="{{route('article',$post5->slug)}}">{{$post5->title}}</a>
                        </h1>
                        <hr  width="80%" align="center" />
                    </div>
                    @endforeach
                    {{-- <div class="row">
                        <h3><a href="">kkkkkkkkkkk sdf dfas fdsa fds fdsaf dsaf dsaf dsaf sdaf dsaf sdaf sdafk</a></h3>
                    </div>
                    <div class="row">
                        <h3><a href="">kkkkkkkkkkk sdf dfas fdsa fds fdsaf dsaf dsaf dsaf sdaf dsaf sdaf sdafk</a></h3>
                    </div>
                    <div class="row">
                        <h3><a href="">kkkkkkkkkkk sdf dfas fdsa fds fdsaf dsaf dsaf dsaf sdaf dsaf sdaf sdafk</a></h3>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- Hết phần danh mục --}}
        
    </main>
    
@stop