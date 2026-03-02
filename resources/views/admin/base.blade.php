<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('layout.head')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body class="p-0 m-0">
    
    @yield('content')  
    @yield('scripts')
  </body>
</html>