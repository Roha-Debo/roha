<!DOCTYPE html>
<html
    dir="{{session()->get('locale') == 'ar' ? 'rtl' : ''}}"
    lang="{{session()->get('locale')}}"
     data-framework="laravel"
    class="light-style layout-navbar-fixed layout-menu-fixed {{session()->get('locale') == 'ar' ? 'rtl' : ''}}"
    data-theme="theme-default"
    data-assets-path="{{asset('backend')}}/"
    data-template="vertical-menu-template"
>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

    <script src="https://cdn.tiny.cloud/1/ch4u39vncjyehmamw3p10yadh46zagl8fhcsvicjho3r7ax9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <meta charset="utf-8" />
    {{-- <meta name="keywords" content=@yield('meta_tags')> --}}
    <meta name ="description", content="@yield('meta_description', 'We build e-commerce site, management site, Android, iOS apps, and teach software development courses online.Laravel, Java, NodeJs, PHP technology.')">
<meta name ="keywords", content="@yield('meta_tags', 'We build e-commerce site, management site, Android, iOS apps, and teach software development courses online.Laravel, Java, NodeJs, PHP technology.')">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ env('APP_NAME') }} - @yield('title','Cpanel')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('backend')}}/img/favicon/favicon.ico" />

    <!-- Fonts -->
   @include('backend.partials.css')
    @stack('style')
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
    @include('backend.partials.sidebar')

        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

        @include('backend.partials.header')

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

               @yield('admin')
                <!-- / Content -->

                <!-- Footer -->
            @include('backend.partials.footer')
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
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
@include('backend.partials.js')
<script>
    {{--window.templateCustomizer = new TemplateCustomizer({--}}
    {{--    lang: '{{ app()->getLocale() }}',--}}
    {{--});--}}
</script>
</body>
</html>
