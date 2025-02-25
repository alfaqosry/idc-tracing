<!doctype html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="aplikasi/material/assets/"
  data-template="vertical-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>IDC Tracing | Halaman Login Akun</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('aplikasi/material/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/fonts/remixicon/remixicon.css') }}" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/node-waves/node-waves.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/@form-validation/form-validation.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('aplikasi/material/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('aplikasi/material/assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('aplikasi/material/assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover">
        <!-- Logo -->
        <a href="index.html" class="auth-cover-brand d-flex align-items-center gap-2">
          <span class="app-brand-logo demo">
            <span style="color: var(--bs-primary)">
              <img src="{{ asset('img/logo.png') }}" height="40px" width="40px" alt="">
            </span>
          </span>
          <span class="app-brand-text demo text-heading fw-semibold">IDC Tracking</span>
        </a>

        <!-- /Logo -->
        <div class="authentication-inner row m-0">
          <!-- /Left Section -->
          <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-12 pb-2">
            <img src="{{ asset('img/halamandepan.png') }}" style="width: 50%;" alt="">

          </div>
          <!-- /Left Section -->

          <!-- Login -->
          <div
            class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-12 px-12 py-6">
            <div class="w-px-400 mx-auto pt-5 pt-lg-0">
              <h4 class="mb-1">Selamat Datang di IDC Tracing 👋</h4>
              <p class="mb-5">Please sign-in to your account and start the adventure</p>

              <form id="formAuthentication" class="mb-5" action="{{route('login.post')}}" method="POST">
                {{csrf_field()}}
                <div class="form-floating form-floating-outline mb-5">
                  <input
                    type="text"
                    class="form-control @error('username') is-invalid @enderror"
                    id="username"
                    name="username"
                    placeholder="Enter your username" 
                    autofocus />
                    @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  <label for="email">Username</label>
                </div>
                <div class="mb-5">
                  <div class="form-password-toggle">
                    <div class="input-group input-group-merge">
                      <div class="form-floating form-floating-outline">
                        <input
                          type="password"
                          id="password"
                          class="form-control"
                          name="password"
                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                          aria-describedby="password" />
                          @error('password')
                          <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                        <label for="password">Password</label>
                      </div>
                      <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                    </div>
                  </div>
                </div>
                <div class="mb-5 d-flex justify-content-between mt-5">
                  <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                  <a href="auth-forgot-password-cover.html" class="float-end mb-1 mt-2">
                    <span>Forgot Password?</span>
                  </a>
                </div>
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
              </form>

              <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-cover.html">
                  <span>Create an account</span>
                </a>
              </p>

              <div class="divider my-5">
                <div class="divider-text">or</div>
              </div>

            
            </div>
          </div>
          <!-- /Login -->
        </div>
      </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('aplikasi/material/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('aplikasi/material/assets/js/pages-auth.js') }}"></script>
  </body>
</html>
