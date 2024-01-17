<header class="header">

    <div class="uk-container uk-container-center">
        <div class="uk-grid" data-uk-grid-match="">
            <div class="uk-width-medium-2-10 uk-width-8-10 uk-flex uk-flex-middle">
                <div class="inside-felx">
                    <a href="#"><img src="#"  alt="{{ __('cp.logo_alt') }}"></a>
                </div>
            </div>
            <div class="uk-width-medium-8-10 uk-flex uk-flex-middle uk-text-right">
                <div class="inside-flex">
                    <div class="uk-hidden-small">
                   
                        <ul class="list-account ajax-login">
                        <li><a href="login">{{__('cp.login')}}</a></li>
                        <li><a href="register">تسجيل جديد</a></li>
                        
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li class="lang">
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <span class="align-middle">{{ $properties['native'] }}</span>
                                        <i class="uk-icon-fa"></i>
                                    </a>
                                </li>
                            @endforeach                               

                        </ul><!--// user menu  -->
                        <ul class="navbar-menu">
                            <li><a href="#">الرئيسية</a></li>
                            <li><a href="#">السوق الاعلامي</a></li>
                            <li><a href="#">الدورات التدريبية</a></li>
                            <li><a href="#">النقل المباشر</a></li>
                            <li><a href="#">عن تكتيك</a></li>
                            <li><a href="#">{{__('cp.employment')}}</a></li>
                            <li><a href="#">اتصل بنا</a></li>
                        
                        </ul>
                    </div><!--// navbar -->
                    <div class="uk-visible-small">
                        <button data-toggle="collapse" data-target="#navbar-menu" aria-expanded="false" type="button" class="uk-button uk-button-large uk-button-primary"><i class="uk-icon-bars"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="uk-visible-small">
    <div class="collapse navbar-collapse navbar-responsive" id="navbar-menu">
        <div class="uk-container uk-container-center">
            <ul class="nav navbar-nav">
                <li><a href="#">الرئيسية</a></li>
                <li><a href="#">السوق الاعلامي</a></li>
                <li><a href="#">الدورات التدريبية</a></li>
                <li><a href="#">النقل المباشر</a></li>
                <li><a href="#">عن تكتيك</a></li>
                <li><a href="#">التوظيف</a></li>
                <li><a href="#">اتصل بنا</a></li>
            </ul>
        </div>
    </div>
</div>
</header>