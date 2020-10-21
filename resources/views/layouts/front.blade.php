<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('include._meta')
</head>
<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v5.0&appId=2522097288049800&autoLogAppEvents=1"></script>
    @include('include._header')
    <div class="row wrap-content bg-page">
        <div class="container">
            @stack('slogan')
            @stack('breadcrumb')
            <div class="container">
                <div class="row bg-white pt-3 pl-3 pr-3">
                    <div class="col-sm-3 col-md-3 col-lg-fix p-0">
                        @include('include._menu')
                    </div>
                    <div class="col-xs-12 col-sm-12 @if(Request::segment(1) == 'home' || is_null(Request::segment(1)) || (Request::segment(1) == 'knowledge' && Request::segment(2) == 'view')) col-md-7 @else col-md-9 @endif col-lg-fix3">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('homepage')
    @include('include._footer')
    @stack('js')
    {!! sweetAlert29() !!}
</body>
</html>
