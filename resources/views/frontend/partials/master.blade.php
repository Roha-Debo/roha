<!DOCTYPE html>
<html lang="ar">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head  dir="{{session()->get('locale') == 'ar' ? 'rtl' : ''}}"
    lang="{{session()->get('locale')}}"
     data-framework="laravel"
    class="light-style layout-navbar-fixed layout-menu-fixed {{session()->get('locale') == 'ar' ? 'rtl' : ''}}"
    data-theme="theme-default"
    data-assets-path="{{asset('backend')}}/"
    data-template="vertical-menu-template">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('cp.title_text') }}</title>
    <meta name="description" content="{{ __('cp.mete_description') }}">
    <meta name="keywords" content="{{ __('cp.mete_keywords') }}">
    {{-- <meta name="description" content="منصة تكتيك من خلالها تعرض مشروعك على أفضل شركات الإنتاج الإعلامي في السعودية  للحصول على عروض الأسعار مباشرة و والتعاقد والدفع والنقاش بشكل احترافي">
    <meta name="keywords" content="تكتيك منصة التكتيك انتاج فيديو مطلوب مصور مصوره مصمم مصممه مونتير ممنتج مونتاج محترف احتراف تصوير وثائقي فيلم قصير طويل شركات انتاج اعلامي شركة دعائي دعايه موشن جرافيك "> --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="{{asset('publicsite/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('publicsite/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('publicsite/css/uikit.min.css" rel="stylesheet')}}">
<link href="{{asset('publicsite/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
<link href="{{asset('publicsite/css/uikit.rtl.min.css')}}" rel="stylesheet">
<link href="{{asset('publicsite/css/main.css')}}" rel="stylesheet">
<link href="{{asset('publicsite/css/main-responsive.css')}}" rel="stylesheet">
<link href="{{asset('publicsite/css/custom.css')}}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@500&display=swap" rel="stylesheet">
<style>
    .lang{
        background-color: #fcaf34;
        color: #fff;
        border-radius: 0;
    }
    .lang a  , .lang i{
        color: #fff !important;
    }
</style>
<body class="">
    
    @include('frontend.partials.header')

    @yield('main')


    @include('frontend.partials.footer')







<script src="{{asset('publicsite/js/app.js')}}"></script>
<script src="{{asset('publicsite/js/jquery.min.js')}}"></script>
<script src="{{asset('publicsite/js/bootstrap.js')}}"></script>
<script src="{{asset('publicsite/js/uikit.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
