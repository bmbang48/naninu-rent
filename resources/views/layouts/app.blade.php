<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>

<body>
    @include('layouts.app.header')

    @yield('content')

    @include('layouts.app.footer')

    <script src="{{asset("js/app.js")}}"></script>
    <script src="{{asset('bootstrap/js/jquery-3.7.1.min.js')}}"></script>
</body>

</html>