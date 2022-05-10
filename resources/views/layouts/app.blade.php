<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/tailwind/tailwind.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/tailwind/tailwind.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-tailwind.png">
    
    
  </head>
  <body class="antialiased bg-body text-body font-body">

    @yield('content')

    
    <script src="{{ URL::asset('js/app.js') }}"></script>
    
    
</body>
</html>