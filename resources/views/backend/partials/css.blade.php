<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
    rel="stylesheet" />

<!-- Icons -->
<link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/tabler-icons.css" />
<link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
{{--<link rel="stylesheet" href="{{ asset(mix('backend/vendor/css' .$configData['rtlSupport'] .'/core' .($configData['style'] !== 'light' ? '-' . $configData['style'] : '') .'.css')) }}" class="{{ $configData['hasCustomizer'] ? 'template-customizer-core-css' : '' }}" />--}}
{{--<link rel="stylesheet" href="{{ asset(mix('backend/vendor/css' .$configData['rtlSupport'] .'/' .$configData['theme'] .($configData['style'] !== 'light' ? '-' . $configData['style'] : '') .'.css')) }}" class="{{ $configData['hasCustomizer'] ? 'template-customizer-theme-css' : '' }}" />--}}

<link rel="stylesheet" href="{{asset('backend')}}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{asset('backend')}}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{asset('backend')}}/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/node-waves/node-waves.css" />
<link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/apex-charts/apex-charts.css" />
<link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/swiper/swiper.css" />
<link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="{{asset('backend/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />

<!-- Page CSS -->
<link rel="stylesheet" href="{{asset('backend')}}/vendor/css/pages/cards-advance.css" />

<link rel="stylesheet" href="{{asset('backend/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('backend/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('backend/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('backend/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('backend/vendor/libs/flatpickr/flatpickr.css')}}" />

<link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
  rel="stylesheet" />

<!-- Icons -->
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/tabler-icons.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css')}}" />

<!-- Core CSS -->
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core.css" class="template-customizer-core-css')}}" /> --}}
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css')}}" /> --}}
<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}"/>
<!-- Row Group CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}"/>
<!-- Form Validation -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />

<!-- Page CSS -->

<!-- Helpers -->
<script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
<script src="{{asset('assets/vendor/js/template-customizer.js')}}"></script>
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
{{-- <script src="{{asset('assets/js/config.js')}}"></script> --}}
<!-- Helpers -->
<script src="{{asset('backend')}}/vendor/js/helpers.js"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
<script src="{{asset('backend')}}/vendor/js/template-customizer.js"></script>
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{asset('backend')}}/js/config.js"></script>
<script src="https://cdn.tiny.cloud/1/ch4u39vncjyehmamw3p10yadh46zagl8fhcsvicjho3r7ax9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<!--form-->
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/tabler-icons.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css')}}"/>
<!-- Include Select2 CSS -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> --}}
<!-- Core CSS -->
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core.css" class="template-customizer-core-css')}}"/> --}}
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css')}}"/> --}}
<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}"/>

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}"/>
