  <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $config->description }}">
    <meta name="keywords" content="{{ $config->keywords }}">

    <title>{{ config('app.name', 'BAROCCO') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
     <!-- 

    built styles and scripts, link to built assets for production and uncomment-->

     <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/app-f2dbdac5.css')}}">
     <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/responsive-5c946308.css') }}">
     <script src="{{ asset('build/assets/app-7c60b6d6.js')}}"></script>
    
    <!--@vite(['resources/sass/app.scss', 'resources/sass/responsive.scss','resources/js/app.js'])-->
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md fixed-top">
                <a class="ms-3 navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'BAROCCO') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                      <li class="ms-3 nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Home
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="{{ route('home')}}">Top</a></li>
                          <li><a class="dropdown-item" href="{{ route('home').'#about'}}">About</a></li>
                          <li><a class="dropdown-item" href="{{ route('home').'#events'}}">What's On?</a></li>
                          <li><a class="dropdown-item" href="{{ route('home').'#contact'}}">Contact</a></li>
                        </ul>
                      </li>

                      @if($config->display_menu)
                      <li class="nav-item ms-3">
                        <a class="nav-link" href="{{ route('home.restaurant') }}">Restaurant Menu</a>
                      </li>
                      @endif
                      <li class="nav-item ms-3">
                        <a class="nav-link" href="{{ route('events.index')}}">Events</a>
                      </li>
                      <li class="nav-item ms-3">
                        <a class="nav-link" href="https://www.facebook.com/profile.php?id=100065932332516"><img src="{{ asset('img/facebook-i.png') }}"></a>
                      </li>
                      <li class="nav-item ms-3">
                        <a class="nav-link" href="https://www.instagram.com/baroccowales/"><img src="{{ asset('img/instagram-i.png') }}"></a>
                      </li>
                    </ul>
                </div>
        </nav>
        {!! EuCookieConsent::getPopup() !!}
        
        @yield('content')
        <footer>
            <ul>
              <li>Contact Us</li>
              <li>&nbsp;<li>
              <li>Telephone:</li>
              <li><a href="tel:029 2034 5021">029 2034 5021</a></li>
              <li>Email:</li>
              <li><a href="emai:baroccowales@gmail.com">baroccowales@gmail.com</a></li>
            </ul>

            <ul style="text-align:right">
              <li class="text-right">Find us</li>
              <li>&nbsp;<li>
              <li>12 Wharton St</li>
              <li>Cardiff</li>
              <li>CF10 1AG</li>
            </ul>

        </footer>
    </div>
</body>
</html>
