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
       //dd($settings);
       $services=Service::with('media')->get();
      // dd($services);
        return view('frontend.main',compact('settings','services'));
    }

    /**
     * Store a newly created resource in storage.
     */

}
