<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/front/master.css">
    <link rel="stylesheet" href="/front/masterpage.css">
    <link rel="stylesheet" href="/font-awesome/fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Blogs</title>
</head>
<body>
<div class="container">
    <h1>kk</h1>
</div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="container">
        <a href="{{route('home')}}" class="navbar-brand">BLOGS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                
                {{-- <?php
                    $category1 = $categories->shift(1);
                ?>
                <li class="nav-item" >
                    <a href="{{route('category',$category1->id)}}" class="nav-link active" >{{$category1->name}}</a>
                </li> --}}

                @foreach($categories as $category)
                <li class="nav-item">
                    <a href="{{route('category',$category->slug)}}" class="nav-link">{{$category->name}}</a>
                </li>
                @endforeach
                
                
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="" class="nav-link active"><i class="fab fa-facebook-square"></i></a>
                    <a href="" class="nav-link active"><i class="fab fa-instagram"></i></i></a>
                    <a href="" class="nav-link active"><i class="fab fa-youtube"></i></a>
                    <a href="" class="nav-link active"><i class="fab fa-twitter"></i></a>
                </li>
                @if(Auth::check())
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <div class="dropdown">
                        <button class="btn btn-secondary   dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item" type="submit">Log Out</button>
                            @can('post-index')
                            <a class="dropdown-item" href="{{route('index')}}">
                            ADMIN</a>
                            @endcan
                            @can('collaborators-posts')
                            <a class="dropdown-item" href="{{route('postcollaborators')}}">
                            MY POST</a>
                            @endcan
                             <a class="dropdown-item" href="{{route('getformchangepassword')}}">
                            Change Password</a>
                            
                        </div>
                    </div>
                    </form>
                </li>
                @endif
            </ul> 
        </div>
    </div>
</nav>

<main>
  @yield('content')
</main>

<footer class=" bg-dark text-center text-white ">
    <div class="contairner">
        <h1>FOOTER</h1>
        
    </div>
    <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="#">Tuấn Anh</a>
      </div>
      <!-- Copyright -->
      
</footer>   

    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script >
    $(document).ready(function() {
        $('.select2').select2();
    });
  </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.select2').select2();
    });
    </script>
</body>
</html>