<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/vinyl-graphics/css/vinyl-graphics.css">
        <title>@yield('title')</title>
    </head>
    <body>
        <ul class="nav justify-content-end">
            @auth
                @if(auth()->user()->admin)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
                @endauth
            @guest
                <li class"nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class"nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endguest
        </ul>
        <div class="container-sm mt-5 mb-5">
            @if(request()->session()->has('error'))
                <div class="alert alert-danger">
                    {{ request()->session()->get('error') }}
                </div>
            @endif
            @if(request()->session()->has('status'))
                <div class="alert alert-warning">
                    {{ request()->session()->get('status') }}
                </div>
            @endif
            @yield('content')
        </div>
        <script src="/vinyl-graphics/js/vinyl-graphics.js"></script>
    </body>
</html>
