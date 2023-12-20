<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::with('media')->first();
        log::info($settings);
        return view('backend.cases.index',compact('settings'));
    }
    public function social_index()
    {
        $settings = Setting::with('media')->first();
        log::info($settings);
        return view('backend.cases.social_index',compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        log::info($request->all());
        $data['section1_title'] = ['en' => $request->section1_title_en, 'ar' => $request->section1_title_ar];
        $data['section1_description'] = ['en' => $request->section1_description_en, 'ar' => $request->section1_description_ar];
        $data['footer_text'] = ['en' => $request->footer_text_en, 'ar' => $request->footer_text_ar];
        if (count(Setting::get()) == 0)
        {
            $settings = Setting::create($data);
        } 
        else
        {
            $settings = Setting::first();
            $settings->update($data);
        }
        if($request->section1_image){
            $settings->clearMediaCollection('section1_image');
            $settings->addMedia($request->file('section1_image'))->toMediaCollection('section1_image');
        }
        if($request->section3_file1){
            $settings->clearMediaCollection('section3_file1');
            $settings->addMedia($request->file('section3_file1'))->toMediaCollection('section3_file1');
        }
        if($request->section3_file2){
            $settings->clearMediaCollection('section3_file2');
            $settings->addMedia($request->file('section3_file2'))->toMediaCollection('section3_file2');
        }
        return response()->json(['message'=>__('cp.update')]);
    }
    public function social_store(Request $request)
    {
        log::info($request->all());
        $data['facebook_link'] =$request->facebook_link;
        $data['instagram_link'] =$request->instagram_link;
        $data['twitter_link'] =$request->twitter_link;
        $data['youtube_link'] =$request->youtube_link;
        if (count(Setting::get()) == 0)
        {
            $settings = Setting::create($data);
        } 
        else
        {
            $settings = Setting::first();
            $settings->update($data);
        }
        return response()->json(['message'=>__('cp.update')]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $settings = Setting::with('media')->first();
        return response()->json(['settings'=>$settings]);
    }
}
