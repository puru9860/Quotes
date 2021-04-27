<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <ul class="navbar-nav mr-auto">

                <li class="nav-item ">
                    <a class="nav-link" href="/">Home</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.quotes', auth()->user()->username) }}">Dashboard</a>
                    </li>
                @endauth

                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('quote.create') }} ">Post</a>
                </li>
            </ul>
            <!-- Authentication Links -->
            <div class="justify-content-end">
                <ul class="navbar-nav mr-auto  ">
                    @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.quotes', auth()->user()->username) }}">
                                    My Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item ">
                            <a href="{{ route('login') }} " class="nav-link">Login</a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('register') }} " class="nav-link">Register</a>
                        </li>

                    @endguest
                </ul>
            </div>

        </div>
    </nav>


    @yield('content')
</body>

</html>
