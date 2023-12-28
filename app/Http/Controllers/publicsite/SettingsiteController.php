<?php

namespace App\Http\Controllers\publicsite;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Pucket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class SettingsiteController extends Controller
{
    public function index()
    {
        $settings = Setting::with('media')->first();
        $settings['section1_title'] = optional($settings)->getTranslation('section1_title', app()->getLocale(Config::get('app.locale')));
        $settings['section1_description'] = optional($settings)->getTranslation('section1_description', app()->getLocale(Config::get('app.locale')));
        $settings['title_text'] = optional($settings)->getTranslation('title_text', app()->getLocale(Config::get('app.locale')));
        $settings['mete_description'] = optional($settings)->getTranslation('mete_description', app()->getLocale(Config::get('app.locale')));
        $settings['mete_keywords'] =optional($settings)->getTranslation('mete_keywords', app()->getLocale(Config::get('app.locale')));
       //dd($settings);
       $services=Service::get();
       $puckets=Pucket::get();
       foreach ($services as $service) {
        $service['title'] = $service->title;
        $service['description'] = $service->description;
       }
       foreach ($puckets as $pucket) {
        $pucket['title'] = $pucket->title;
        $pucket['description'] = $pucket->description;
       }
      // dd($services);
        return view('frontend.main',compact('settings','services','puckets'));
    }

    /**
     * Store a newly created resource in storage.
     */

}
