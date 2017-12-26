<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        var loc = window.location.href+'';
        if (loc.indexOf('http://') === 0){
            window.location.href = loc.replace('http://','https://');
        }
    </script>
    <title>Central Hub | Glory City Church of Melbourne</title>
    <link rel="icon" href="{!! asset('images/small-logo.png') !!}"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="flex-center position-ref full-height">
    <div class="content">
        <img class="logo" style="display: block;margin: auto;width: 40%;" src="{{ asset('images/gcc-logo.jpg') }}" />
        <div class="title m-b-md">
            Say hi
        </div>

        <div class="links">
            <a href="{{ url('/summit-2018') }}">2018 高峰会</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @endauth
                    @endif
        </div>
    </div>
</div>
</body>
</html>
