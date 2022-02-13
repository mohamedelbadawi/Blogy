<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{ asset('css/templatemo-xtra-blog.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body>
<!-- Top Navbar -->
</body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top auto-hiding-navbar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="" class="navbar-brand text-primary"><strong>Blogy</strong></a>

        <div class="collapse navbar-collapse pe-3 ps-3" id="navbarSupportedContent">
            @auth
{{--            <form class="d-flex search-form ">--}}
{{--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--            </form>--}}
            <ul class="navbar-nav  ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>

                        <li>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>
    </div>
    @endauth
</nav>
<!-- sidebar -->
@auth
<div class="row">
    <div class="col-1">
        <nav id="sidebar" class="col sidebar">
            <ul class="nav flex-column vertical-nav">

                <li class="nav-item">
                    <a class="nav-link {{ (request()->segment(3)=='category'||request()->segment(3)=='categories')? 'active' : '' }}" href="{{route('category.index')}}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(request()->segment(3)=='article'||request()->segment(3)=='articles')? 'active' : '' }}" href="{{route('article.index')}}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(request()->segment(3)=='tag'||request()->segment(3)=='tags')? 'active' : '' }} " href="{{route('tag.index')}}" >Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(request()->segment(3)=='contacts')? 'active' : '' }} " href="{{route('contact.index')}}" >Contacts</a>
                </li>

            </ul>
        </nav>
    </div>
</div>
@endauth
@yield('content')
@include('sweet::alert')

</html>
