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
        $settings['section1_title'] = optional($settings)->section1_title;
        $settings['section1_description'] = optional($settings)->section1_description;
        $settings['title_text'] = optional($settings)->title_text;
        $settings['mete_description'] = optional($settings)->mete_description;
        $settings['mete_keywords'] =optional($settings)->mete_keywords;
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
