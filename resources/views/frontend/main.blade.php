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
@foreach($puckets as $pucket)
<div class="uk-container uk-container-center">
    <a href="#"><div class="uk-container uk-container-center">
        <div class="breadcrumb-account login-page">
            <h1>{{$pucket->title}}</h1>
            <p>{{ $pucket->description }}</p>
        </div></a>
</div>  
<div class="dividers"></div>
@endforeach
<div class="dividers"></div>
@php
if($settings)
{
$section3File1 = $settings->media->where('collection_name', 'section3_file1')->first();
$section3File2 = $settings->media->where('collection_name', 'section3_file2')->first();
}
@endphp
<div class="uk-container uk-container-center">
    <div class="block-slides">
        <div class="uk-grid uk-grid-small ">
            <div class="uk-width-medium-1-2">
                
                <a href="{{ optional($section3File1)->original_url }}" class="block-slide slide-1" style="min-height:auto">
                    <div class="text">
                        <h1>
                            {{ __('cp.request_service') }}
                        </h1>
                        <p>
                            {{ __('cp.file1_description') }}
                        </p>
                    </div>
                    <div class="victor">
                        <img src="images/vic-1.png" alt="">
                    </div>
                </a>
            </div>
            <div class="uk-width-medium-1-2">
                
                <a href="{{ optional($section3File2)->original_url  }}" class="block-slide slide-1" style="min-height:auto">
                    <div class="text">
                        <h1>
                            {{ __('cp.request_service') }}
                        </h1>
                        <p>
                            {{ __('cp.file2_description') }}
                        </p>
                    </div>
                    <div class="victor">
                        <img src="images/vic-1.png" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div> 




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