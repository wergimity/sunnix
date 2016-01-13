<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Įvykių priminimai greitai ir patogiai">
    <meta name="author" content="Rytis Raslavičius">
    <base href="{{ url() }}">

    <title>{{ trans('front.name') }} - {{ trans('front.description') }}</title>

    <link rel="stylesheet" href="css/front.css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]><script src="js/ie.js"></script><![endif]-->

</head>

<body id="page-top" class="index">

<!-- Navigation -->
@include('front.nav')

        <!-- Header -->
@include('front.header')

        <!-- Portfolio Grid Section -->
@include('front.grid')

        <!-- About Section -->
@include('front.about')

@include('front.responsive')

        <!-- Footer -->
@include('front.footer')

        <!-- Javascript -->
<script src="js/front.js"></script>

</body>

</html>