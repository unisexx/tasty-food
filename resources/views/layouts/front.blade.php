<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('include._meta')
</head>
<body>
    @include('include._header')
    @yield('content')
    @include('include._footer')
    @stack('js')
    {!! sweetAlert29() !!}
</body>
</html>
