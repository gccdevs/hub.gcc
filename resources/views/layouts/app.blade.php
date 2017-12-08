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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">--}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script>
        var GCC = {
            csrfToken: "{{ csrf_token() }}",
            stripeKey: "{{ config('services.stripe.key') }}"
        };
    </script>
</head>
<body>

<nav class="navbar is-black">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('home') }}">
            <img src="{{ asset('images/gcc-logo.png') }}" alt="Glory City Church of Melbourne" width="112" height="28">
        </a>
        <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ route('home') }}">
                Home
            </a>
            {{--<div class="navbar-item has-dropdown is-hoverable">--}}
                {{--<a class="navbar-link" href="/documentation/overview/start/">--}}
                    {{--Docs--}}
                {{--</a>--}}
                {{--<div class="navbar-dropdown is-boxed">--}}
                    {{--<a class="navbar-item" href="/documentation/overview/start/">--}}
                        {{--Overview--}}
                    {{--</a>--}}
                    {{--<a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">--}}
                        {{--Modifiers--}}
                    {{--</a>--}}
                    {{--<a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">--}}
                        {{--Columns--}}
                    {{--</a>--}}
                    {{--<a class="navbar-item" href="https://bulma.io/documentation/layout/container/">--}}
                        {{--Layout--}}
                    {{--</a>--}}
                    {{--<a class="navbar-item" href="https://bulma.io/documentation/form/general/">--}}
                        {{--Form--}}
                    {{--</a>--}}
                    {{--<hr class="navbar-divider">--}}
                    {{--<a class="navbar-item" href="https://bulma.io/documentation/elements/box/">--}}
                        {{--Elements--}}
                    {{--</a>--}}
                    {{--<a class="navbar-item is-active" href="https://bulma.io/documentation/components/breadcrumb/">--}}
                        {{--Components--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                    @guest
                        {{--do something--}}
                        @else
                            <p class="control">
                                <a class="button is-info"
                                   data-social-network="Twitter"
                                   data-social-action="tweet"
                                   data-social-target="http://localhost:4000"
                                   target="_blank"
                                   href="{{ route('dashboard') }}">
                            <span>
                {{ Auth::user()->name }}
              </span>
                                </a>
                            </p>
                            <p class="control">
                                <a class="bd-tw-button button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <span>Logout</span>
                                </a>
                            </p>
                            <form id="logout-form" class="nav-link" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            @endguest
                </div>
            </div>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
