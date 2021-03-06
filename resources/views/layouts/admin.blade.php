<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlfaPolitAdmin - @yield('title')</title>
    <meta name="description" content="Administration area of Alfapolit website.">

    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/img/favicons/manifest.json">
    <link rel="mask-icon" href="/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- Styles -->
    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=269342813510825";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
   
   
    <div id="admin">
        @include('layouts.partials._admin-menu')

        <div id="admin-body">
            <div id="admin-header" class="admin-wrapper">
                <div class="open-menu">
                    <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
                </div>
                <form class="search-form">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" name="search" class="search" placeholder="Search" @if(isset($param_val)) value="{{ $param_val }}" @endif>
                </form>
                <div class="logout">
                    <a href="{{ url('/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span></a>
                </div>
            </div>


            @yield('content')


            <div id="admin-footer" class="admin-wrapper">
                <p>Created by <a href="https://www.facebook.com/uynann" target="_blank"><b>Uy Nann</b></a></p>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="/js/admin.js"></script>
</body>
</html>
