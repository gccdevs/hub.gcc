<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{!! asset('images/small-logo.png') !!}"/>
    <title>Summit 2018 - Glory City Church of Melbourne</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script>
        var GCC = {
            csrfToken: "{{ csrf_token() }}",
            stripeKey: "{{ config('services.stripe.key') }}"
        };
    </script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon">Toggle Navigation</span>
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img class="navbar-brand" style="width:inherit !important; height: 38px; vertical-align: middle;" src="{{ asset('images/gcc-logo.png') }}" />
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <!-- Left Side Of Navbar -->
        {{--<ul class="nav navbar-nav">--}}
        {{--&nbsp;--}}
        {{--</ul>--}}

        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0" style="float: right">
                <!-- Authentication Links -->
                @guest
                    {{--<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>--}}
                    {{--<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>--}}
                    @else
                        <li class="dropdown nav-item">
                            <a class="nav-link" href="/dashboard" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" class="nav-link" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>

@yield('content')
<br>

<div id="app">
    <app></app>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
