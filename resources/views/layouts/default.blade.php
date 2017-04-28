<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @stack('styles')     
        <link href="{{ asset('css/colors/gray-dark.css') }}" id="theme" rel="stylesheet">
    </head>
    <body>
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <div id="wrapper">
            @include('partials.header')
            @include('partials.sidebar')
            <div id="page-wrapper">
                <div class="container-fluid">
                    @yield('content')
                    @include('partials.sidebar-right')
                </div>
                @include('partials.footer')
            </div>
        </div>
        @stack('scripts')
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script> 
    </body>
</html>