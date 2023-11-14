<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <meta name="csrf-token" content="{{ csrf_token() }}">

   @include('layout.header')
   
   @yield('title')

</head>
<body>
   @include('layout.navbar')
   @yield('main-body')

   @include('layout.footer')
</body>
</html>