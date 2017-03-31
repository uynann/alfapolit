<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @yield('meta')

    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/img/favicons/manifest.json">
    <link rel="mask-icon" href="/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Angkor|Siemreap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">

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
  
  
  <script>      
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '269342813510825',
          xfbml      : true,
          version    : 'v2.6'
        });
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));      
    </script>
   
    @include('layouts.partials._header')

    @yield('content')

    @include('layouts.partials._footer')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
