@extends('frontend.partials.master')

@section('main')
<div class="container">
    {{-- {{$settings}} --}}
    <div class="dividers"></div>
    <div class="row wow fadeInUp" data-wow-duration="2.5s" data-wow-offset="50" style="visibility: visible;">
        <div class="col-md-12 section order-2 order-md-0" data-wow-duration="2.5s" data-wow-offset="50">
            <a class="link" href="#">
                
                <img class="img wow zoomIn"
                src="{{ optional($settings->getMedia('section1_image')->first())->getUrl() ?? asset('publicsite/images/01.jpg') }}"
                class="w-100" alt="img wow zoomIn">
           
            </a>
        </div>
    </div>
    <div class="dividers"></div>


</div>


 
    <div class="container">
        <div class="dividers"></div>
        <div class="row wow fadeInUp" data-wow-duration="2.5s" data-wow-offset="50"
             style="visibility: visible; animation-duration: 2.5s; animation-name: fadeInUp;">
            <div class="col-md-6 section order-2 order-md-0" data-wow-duration="2.5s" data-wow-offset="50">
                <h3 class="head">{{ optional($settings)->section1_title}}</h3>
            </div>
            <div class="col-md-6 section order-1 order-md-0 section-text">
                <div class="wrap">
                    <div class="read-more" onclick="this.classList.add('expanded')">
                        <div class="content">
                            <p style="font-size: 18px;"> {{ optional($settings)->section1_description }} .</p>
                        </div>
                        <span class="trigger"><i class="fas fa-chevron-down"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="dividers"></div>
    </div>
    






<div class="uk-container uk-container-center">
    <a href="#"><div class="uk-container uk-container-center">
        <div class="breadcrumb-account login-page">
            <h1>الخدمة</h1>
            <p>ليس لديك حساب ؟ </p>
        </div></a>

</div>
<div class="dividers"></div>
<a href="#"><div class="uk-container uk-container-center">
    <div class="breadcrumb-account login-page">
        <h1>الخدمة</h1>
        <p>ليس لديك حساب ؟ </p>
    </div></a>

</div>
<!-- <div class="uk-container uk-container-center">
   Example of your ads placing 
    <div class="block-slides">
        <div class="uk-grid uk-grid-small ">
            <div class="uk-width-medium-2-2">
                
                <a href="#" class="block-slide slide-1" style="min-height:auto">
                    <div class="text">
                        <h1>
                            اطلب خدمة
                        </h1>
                        <p>
                            العديد من شركات الانتاج الإعلامي والمصممين والمطورين المحترفين في تكتيك مستعدين للعمل على مشروعك
                        </p>
                    </div>
                    <div class="victor">
                        <img src="images/vic-1.png" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div> -->




<div class="container">
    @foreach($services as $service)
  {{-- {{$service}} --}}
        <div class="dividers"></div>
        <div class="row wow fadeInUp" data-wow-duration="2.5s" data-wow-offset="50"
             style="visibility: visible; animation-duration: 2.5s; animation-name: fadeInUp;">

         @if($loop->iteration % 2 == 0)
         @php
         $serviceImage = $service->media->where('collection_name', 'service_image')->first();
         @endphp
                <div class="col-md-6 section order-2 order-md-0">
                    <a class="link" href="#">
                        <img class="img wow zoomIn" src="{{ optional($serviceImage)->original_url}}" class="w-100"
                             alt="{{ optional($service)->title }}">
                    </a>
                </div>
                <div class="col-md-6 section order-1 order-md-0 section-text">
                    <h2 class="head">{{ optional($service)->title  }}</h2>
                    <p class="font-weight-light">{{optional($service)->description  }} </p>
                </div>
            @else
            @php
            $serviceImage = $service->media->where('collection_name', 'service_image')->first();
            @endphp
                <div class="col-md-6 section order-1 order-md-0 section-text">
                    <h2 class="head">{{ optional($service)->title  }}</h2>
                    <p class="font-weight-light">{{ optional($service)->description  }} </p>
                </div>
                <div class="col-md-6 section order-2 order-md-0">
                    <a class="link" href="#">
                        <img class="img wow zoomIn" src="{{optional($serviceImage)->original_url}}" class="w-100"
                             alt="{{ optional($service)->title  }}">
                    </a>
                </div>
            @endif
        </div>
        <div class="dividers"></div>
    @endforeach
</div>


@endsection