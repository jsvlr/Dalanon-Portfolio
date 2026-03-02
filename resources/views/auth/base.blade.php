<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('layout.head')
    {!! Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!}
  </head>
  <body class="p-0 m-0 position-relative">
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show position-absolute top-0 end-0 mt-2 z-1" role="alert">
            <strong>ERROR</strong> {{ $errors->first() }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @yield('content')  
    @yield('scripts')
  </body>
</html>