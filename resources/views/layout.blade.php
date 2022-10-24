<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <title>Blog</title>
  </head>
  <body>
    @yield('content')
  </body>
</html>