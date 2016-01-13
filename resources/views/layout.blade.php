<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Įvykių priminimai greitai ir patogiai">
    <meta name="author" content="Rytis Raslavičius">

    <title>{{ trans('front.name') }} - {{ trans('front.description') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]><script src="{{ asset('js/ie.js') }}"></script><![endif]-->

</head>

<body>

@include('layout.nav')

@yield('content')

<script>window.input_errors = {!! json_encode($errors->toArray()) !!};</script>
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')

</body>

</html>