<!doctype html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-wide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="aplikasi/material/assets/"
  data-template="front-pages"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>IDC Tracing | @yield('title')</title>

    <meta name="description" content="" />

    @include('layouts.frontend.partials.link')
  </head>

  <body>
    <script src="{{ asset('aplikasi/material/assets/vendor/js/dropdown-hover.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/js/mega-dropdown.js') }}"></script>

    <!-- Navbar: Start -->
    @include('layouts.frontend.partials.navbar')
    <!-- Navbar: End -->

    <!-- Sections:Start -->
    @yield('content')
    <!-- / Sections:End -->

    <!-- Footer: Start -->
    @include('layouts.frontend.partials.footer')
    <!-- Footer: End -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @include('layouts.frontend.partials.scripts')
  </body>
</html>
