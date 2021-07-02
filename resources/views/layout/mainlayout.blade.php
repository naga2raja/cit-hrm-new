<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.head')
  </head>
  <body>
  @if(!Route::is(['forgot-password','login','register', 'password.request']) && !(\Request::is('password/reset/*')) )
  @include('layout.partials.header')
  @endif
 @yield('content')
 @include('layout.partials.footer-scripts')


  </body>
</html>