@extends('frontend.partials.master')
@section('main')
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
    


<div class="uk-container uk-container-center">
    <div class="block-myaccount-menu uk-margin-bottom">
        <div class="uk-clearfix">
            <div class="uk-float-left">
                <div class="uk-hidden-small">
                    <ul class="list-account-nav">
                        <li><a href="http://127.0.0.1:8000/profile" class="active-navbar2">حسابى</a></li>
                        <li><a href="http://127.0.0.1:8000/ar/my-projects" class="">طلباتي</a></li>
                    </ul>
                </div>
                <div class="uk-visible-small">
                    <a data-toggle="collapse" data-target="#navbar-menu-account" aria-expanded="false"><i class="uk-icon-navicon"></i></a>
                </div>
            </div>
            <div class="uk-float-right">
                <a class="logout-button" href="http://127.0.0.1:8000/logout" title="تسجيل خروج" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                    <i class="uk-icon-power-off"></i>
                </a>
                <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="QNjij5k3gWaf4RA49SJwBPbg1g9IONek8UKcOePj">                </form>
            </div>

        </div>
        <div class="uk-visible-small">
            <div class="collapse navbar-collapse navbar-responsive uk-margin-remove" id="navbar-menu-account">
                <div class="uk-container uk-container-center">
                    <ul class="nav navbar-nav">
                        <li><a href="http://127.0.0.1:8000/profile" class="active-navbar2">حسابى</a></li>
                        <li><a href="#" class="">طلباتي</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <ul class="uk-breadcrumb breadcrumb-with-border">
        <li class="uk-active "><a href="">حسابى</a></li>

    </ul>

    
    <div class="uk-grid uk-margin-top" data-uk-grid-margin="" data-uk-grid-match="{target:'.block-m'}">
        <div class="uk-width-xxlarge uk-margin">
            <div class="block-m block-account uk-flex uk-flex-middle uk-text-center">
                <div class="inside-flex">
                    <div class="uk-width-xlarge uk-margin">
                        <!-- <div class="uk-width-2-9">
                            <img src="https://ui-avatars.com/api/?background=0D8ABC&amp;color=fff&amp;name=osama abdullah" class="uk-border-circle" alt="">
                            <br><br>
                        </div> -->
                        <div class="uk-width-4-9 uk-text-center">
                            <img style="width: 78px; height: 78px; object-fit: fill;" src="https://ui-avatars.com/api/?background=0D8ABC&amp;color=fff&amp;name={{Auth::user()->username}} class="uk-border-circle" alt="">

                            <div class="block-details-account">
                                <h3>{{Auth::user()->username}} </h3>
                                <p>الاردن</p>
                                <p>{{Auth::user()->email}}</p>
                                <p><span dir="ltr">{{auth::user()->phone}}</span></p>
                                <br>
                                <div class="uk-text-center">
                                    <a class="go-settings" href="http://127.0.0.1:8000/ar/profile/settings"><i class="uk-icon-gear"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        


</body>
@endsection