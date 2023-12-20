<?php

namespace App\Http\Controllers\publicsite;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class SettingsiteController extends Controller
{
    public function index()
    {
        $settings = Setting::with('media')->first();
        $settings['section1_title'] = $settings->getTranslation('section1_title', app()->getLocale(Config::get('app.locale')));
        $settings['section1_description'] = $settings->getTranslation('section1_description', app()->getLocale(Config::get('app.locale')));
       //dd($settings);
       $services=Service::with('media')->get();
       foreach ($services as $service) {
        $service['title'] = $service->getTranslation('title', app()->getLocale(Config::get('app.locale')));
        $service['description'] = $service->getTranslation('description', app()->getLocale(Config::get('app.locale')));
       }
      // dd($services);
        return view('frontend.main',compact('settings','services'));
    }

    /**
     * Store a newly created resource in storage.
     */

}
