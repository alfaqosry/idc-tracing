<!doctype html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
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

    <title>Registrasi | IDC Tracking </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/fonts/remixicon/remixicon.css')}}" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/node-waves/node-waves.css')}}" />

    <!-- Core CSS -->
    
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/tagify/tagify.css')}}" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/flatpickr/flatpickr.css')}}" />
    <link rel="stylesheet" href="{{ asset('aplikasi/material/assets/vendor/libs/@form-validation/form-validation.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('aplikasi/material/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('aplikasi/material/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('aplikasi/material/assets/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
       

        <!-- Layout container -->
        

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Property Listing Wizard -->
              <div id="wizard-property-listing" class="bs-stepper vertical mt-2">
                <div class="bs-stepper-header gap-lg-3 border-end">
                  <div class="step" data-target="#personal-details">
                    <button type="button" class="step-trigger">
                      <span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
                      <span class="bs-stepper-label">
                        <span class="bs-stepper-number">01</span>
                        <span class="d-flex flex-column ms-2">
                          <span class="bs-stepper-title">Data Diri Siswa</span>
                          <span class="bs-stepper-subtitle">Nama Kamu/Tanggal Lahir</span>
                        </span>
                      </span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#property-details">
                    <button type="button" class="step-trigger">
                      <span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
                      <span class="bs-stepper-label">
                        <span class="bs-stepper-number">02</span>
                        <span class="d-flex flex-column ms-2">
                          <span class="bs-stepper-title">Foto Profile</span>
                          <span class="bs-stepper-subtitle">Foto Profile anda</span>
                        </span>
                      </span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#property-features">
                    <button type="button" class="step-trigger">
                      <span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
                      <span class="bs-stepper-label">
                        <span class="bs-stepper-number">03</span>
                        <span class="d-flex flex-column ms-2">
                          <span class="bs-stepper-title">Selesaikan Pendaftaran</span>
                          <span class="bs-stepper-subtitle">Bedrooms/Floor No</span>
                        </span>
                      </span>
                    </button>
                  </div>
                  <div class="line"></div>
                </div>
                <div class="bs-stepper-content">
                  <form id="wizard-property-listing-form" onSubmit="return false">
                    <!-- Personal Details -->
                    <div id="personal-details" class="content">
                      <div class="row g-5">
                        <div class="col-sm-6 mt-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="name"
                              name="name"
                              class="form-control"
                              placeholder="John" />
                            <label for="name">Nama Lengkap</label>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="username"
                              name="username"
                              class="form-control"
                              placeholder="john.doe" />
                            <label for="username">Username</label>
                          </div>
                        </div>

                        <div class="col-sm-6 mt-6">
                          <div class="form-floating form-floating-outline">
                            <select
                              id="jkelamin"
                              name="jkelamin"
                              class="select2 form-select"
                              data-allow-clear="true">
                              <option value="lk">Laki-Laki</option>
                              <option value="pr">Perempuan</option>
                            </select>
                            <label for="jkelamin">Jenis Kelamin</label>
                          </div>
                        </div>

                        <div class="col-sm-6 mt-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="alamat"
                              name="alamat"
                              class="form-control"
                              placeholder="Jln Pramuka, Bangkinang" />
                            <label for="alamat">Alamat</label>
                          </div>
                        </div>

                        <div class="col-sm-6 mt-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="tempatlahir"
                              name="tempatlahir"
                              class="form-control"
                              placeholder="Bangkinang" />
                            <label for="tempatlahir">Tempat Lahir</label>
                          </div>
                        </div>

                        <div class="col-sm-6 mt-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="date"
                              id="tgllahir"
                              name="tgllahir"
                              class="form-control"
                              placeholder="John" />
                            <label for="tgllahir">Tanggal Lahir</label>
                          </div>
                        </div>

                        <div class="col-sm-6 mt-6">
                          <div class="form-floating form-floating-outline">
                            <select
                              id="suku"
                              name="suku"
                              class="select2 form-select"
                              data-allow-clear="true">
                              <option>Melayu</option>
                              <option>Medan</option>
                            </select>
                            <label for="suku">Suku</label>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input
                                type="text"
                                id="nohp"
                                name="nohp"
                                class="form-control contact-number-mask"
                                placeholder="0852XXXXXXXX" />
                              <label for="nohp">No HP/WA</label>
                            </div>
                            <span class="input-group-text">IND (+62)</span>
                          </div>
                        </div>

                        <div class="col-sm-6 mt-6">
                          <div class="form-floating form-floating-outline">
                            <select
                              id="sekolah"
                              name="sekolah"
                              class="select2 form-select"
                              data-allow-clear="true">
                              <option>Melayu</option>
                              <option>Medan</option>
                            </select>
                            <label for="sekolah">Nama Sekolah</label>
                          </div>
                        </div>

                        <div class="col-sm-6 mt-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="number"
                              id="nisn"
                              name="nisn"
                              class="form-control"
                              placeholder="Masukan NISN" />
                            <label for="nisn">NISN</label>
                          </div>
                        </div>
                        
                        <div class="col-12 d-flex justify-content-between mt-6">
                          <button class="btn btn-outline-secondary btn-prev" disabled>
                            <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                          </button>
                          <button class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                            <i class="ri-arrow-right-line ri-16px"></i>
                          </button>
                        </div>
                      </div>
                    </div>

                    <!-- Property Details -->
                    <div id="property-details" class="content">
                      <div class="row g-5">

                        <div class="col-sm-12 mt-12">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="file"
                              id="foto"
                              name="foto"
                              class="form-control"
                              placeholder="John" />
                            <label for="foto">Foto Profile</label>
                          </div>
                        </div>
                        
                    
                        <div class="col-12 d-flex justify-content-between mt-6">
                          <button class="btn btn-outline-secondary btn-prev">
                            <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                          </button>
                          <button class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                            <i class="ri-arrow-right-line ri-16px"></i>
                          </button>
                        </div>
                      </div>
                    </div>

                    <!-- Property Features -->
                    <div id="property-features" class="content">





                      <div class="row g-5">
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="number"
                              id="plBedrooms"
                              name="plBedrooms"
                              class="form-control"
                              placeholder="3" />
                            <label for="plBedrooms">Bedrooms</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="number"
                              id="plFloorNo"
                              name="plFloorNo"
                              class="form-control"
                              placeholder="12" />
                            <label for="plFloorNo">Floor No</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="number"
                              id="plBathrooms"
                              name="plBathrooms"
                              class="form-control"
                              placeholder="4" />
                            <label for="plBathrooms">Bathrooms</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <select id="plFurnishedStatus" name="plFurnishedStatus" class="form-select">
                              <option selected disabled value="">Select furnished status</option>
                              <option value="1">Fully furnished</option>
                              <option value="2">Furnished</option>
                              <option value="3">Semi furnished</option>
                              <option value="4">Unfurnished</option>
                            </select>
                            <label for="plFurnishedStatus">Furnished Status</label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-floating form-floating-outline">
                            <input
                              id="plFurnishingDetails"
                              name="plFurnishingDetails"
                              class="form-control h-auto"
                              placeholder="select options"
                              value="Fridge, AC, TV, WiFi" />
                            <label for="plFurnishingDetails">Furnishing Details</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <label class="mb-3">Is there any common area?</label>
                          <div class="form-check ms-2">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="plCommonAreaRadio"
                              id="plCommonAreaRadioYes"
                              checked />
                            <label class="form-check-label" for="plCommonAreaRadioYes">Yes</label>
                          </div>
                          <div class="form-check ms-2">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="plCommonAreaRadio"
                              id="plCommonAreaRadioNo" />
                            <label class="form-check-label" for="plCommonAreaRadioNo">No</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <label class="mb-3">Is there any attached balcony?</label>
                          <div class="form-check ms-2">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="plAttachedBalconyRadio"
                              id="plAttachedBalconyRadioYes"
                              checked />
                            <label class="form-check-label" for="plAttachedBalconyRadioYes">Yes</label>
                          </div>
                          <div class="form-check ms-2">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="plAttachedBalconyRadio"
                              id="plAttachedBalconyRadioNo" />
                            <label class="form-check-label" for="plAttachedBalconyRadioNo">No</label>
                          </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between mt-6">
                          <button class="btn btn-outline-secondary btn-prev">
                            <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                          </button>
                          <button class="btn btn-success btn-submit btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Submit</span>
                            <i class="ri-check-line ri-16px ms-0 ms-sm-2"></i>
                          </button>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
              <!--/ Property Listing Wizard -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                  <div class="text-body mb-2 mb-md-0">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with <span class="text-danger"><i class="tf-icons ri-heart-fill"></i></span> by
                    <a href="https://pixinvent.com" target="_blank" class="footer-link">Pixinvent</a>
                  </div>
                  <div class="d-none d-lg-inline-block">
                    <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                      >License</a
                    >
                    <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
                      >More Themes</a
                    >

                    <a
                      href="https://demos.pixinvent.com/materialize-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
     
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('aplikasi/material/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('aplikasi/material/assets/vendor/libs/cleavejs/cleave.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/tagify/tagify.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/@form-validation/popular.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
    <script src="{{asset('aplikasi/material/assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('aplikasi/material/assets/js/main.js')}}"></script>

    <!-- Page JS -->

    <script src="{{asset('aplikasi/material/assets/js/wizard-ex-property-listing.js')}}"></script>
  </body>
</html>
