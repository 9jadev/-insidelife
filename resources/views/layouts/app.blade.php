<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    
    <!-- Custom styles for this template -->

    <title>{{ config('app.name', 'Inside Life') }}</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('share')
</head>
<body>
    <div id="app">
            <div class="container">
                 @include('inc.header')
            </div>

        <main role="main" class="container">
             @yield('slider')
            @yield("content")
            @yield('sha')
        </main>
    </div>
    @include('inc.footer') 
    <!-- Scripts -->

         @yield("create")   
    
</body>
</html>
