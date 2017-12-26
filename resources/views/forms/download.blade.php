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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Summit 2018 - Glory City Church of Melbourne</title>
    {{--    <link rel="icon" href="{!! asset('images/small-logo.png') !!}"/>--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
    <script>
        var GCC = {
            csrfToken: "{{ csrf_token() }}",
            stripeKey: "{{ config('services.stripe.key') }}"
        };
    </script>
</head>
<body>

<a class="button is-primary" href="/users/list" download>Download</a>

<script src="https://checkout.stripe.com/checkout.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="/js/app.js"></script>
</body>
</html>
