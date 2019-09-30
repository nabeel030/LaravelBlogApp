<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/master.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('profile.index') }}">
                                      Profile
                                  </a>
                                    <a class="dropdown-item" href="{{route('logout')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @if(Auth::user()->admin)
                                    <a class="dropdown-item" href="{{ route('blog.setting') }}">
                                        Setting
                                    </a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<br>
        <div class="container">
          <div class="row">

            @if(Auth::check())

            <div class="col-lg-4">
                <ul class="list-group">
                  <a href="{{Route('index')}}" class="list-group-item">Front End</a>
                  <a href="{{Route('dashboard')}}" class="list-group-item">Dashboard</a>

                  @if(Auth::user()->admin)
                      <a href="{{Route('user.create')}}" class="list-group-item">Add User</a>
                      <a href="{{Route('users')}}" class="list-group-item">Users</a>
                  @endif

                  <a href="{{Route('post.create')}}" class="list-group-item">Create Post</a>
                  <a href="{{Route('post.index')}}" class="list-group-item">All Posts</a>
                  <a href="{{Route('post.trash')}}" class="list-group-item">Trash</a>
                  <a href="{{Route('category.create')}}" class="list-group-item">Create Category</a>
                  <a href="{{Route('category.home')}}" class="list-group-item">All Categories</a>
                  <a href="{{Route('tag.create')}}" class="list-group-item">Create Tag</a>
                  <a href="{{Route('tag.index')}}" class="list-group-item">All Tags</a>
                  <a href="{{Route('self.delete',['id'=>Auth::user()->id])}}" class="list-group-item">Delete Account</a>
                </ul>
            </div>

            @endif

            <div class="col-lg-8">
              @yield('content')
            </div>
          </div>
        </div>
    </div>
      <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script>
    @if(Session::has('success'))
      toastr.success("{{Session::get('success')}}")
    @endif

    @if(Session::has('info'))
      toastr.info("{{Session::get('info')}}")
    @endif

    </script>

    @yield('scripts')

</body>
</html>
