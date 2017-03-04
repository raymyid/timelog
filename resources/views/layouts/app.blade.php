<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Timelog') - {{ config('app.name', 'Timelog') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    @stack('css')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Timelog') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('posts.index') }}">Posts</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('auth.login') }}">@lang('auth.login')</a></li>
                            <li><a href="{{ route('auth.register') }}">@lang('auth.register')</a></li>
                        @else
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span class="caret">
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('posts.create') }}">New Article</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="{{ isset(Auth::user()->avatar) ? Auth::user()->avatar : '/img/default_avatar0.png'}}" style="height:20px; border-radius: 3px;"> {{ Auth::user()->nickname }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('users.show2', Auth::user()->username) }}">Your profile</a></li>
                                    <li><a href="{{ route('home.index') }}">Home</a></li>
                                    <li>
                                        <a href="{{ route('auth.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <footer class="mt-6 p-2" style="background-color: #333">
        <div class="container">
            <span>Powered by <a href="https://github.com/xiaoruicode/timelog">Timelog</a></span>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="/js/app.js"></script>
    @stack('javascript')
</body>
</html>
