<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
  <head>
    @include('layout.head')
    {!! Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!}
  </head>
  <body class="position-relative text-light">
    @include('layout.navbar')
    @yield('content')
    @include('layout.footer')

    @if($errors->any())
        <script>
            alert(`{{ $errors->first() }}`)
        </script>
    @endif
    @if (session('success'))
        <script>
            alert(`{{ session('success') }}`);
        </script>
    @endif

    @yield('modals')
    @yield('scripts')
    <script src="{{ asset('javascript/navbar-update-selected.js') }}"></script>
  </body>
</html>
