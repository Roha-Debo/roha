<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    // public function index2(Request $request)
    // {
    //     $parent_categories = CategoryResource::collection(Category::whereNull('parent_id')->latest()->get());
    //     $child_categories = CategoryResource::collection(Category::whereNotNull('parent_id')->latest()->get());
    //      // dd($parent_categories);
    //      $hospital_id=0;
    //      if($request->has('hospital_id'))
    //      {
    //          $hospital_id=$request->hospital_id;
    //      }
    //     return view('.backend.doctors.final',compact(['parent_categories', 'child_categories','hospital_id']));
    // }

    // public function doctors_api(Request $request)
    // {
    //     $parent_categories = CategoryResource::collection(Category::whereNull('parent_id')->latest()->get());
    //     $columns = [
    //         1 => 'id',
    //         2 => 'first_name',
    //         3=>'last_name',
    //         4=>'description',
    //         5=>'gender',
    //         6 => 'email',
    //         7 => 'phone',
    //         8=>'is_trainer',
    //         9=>'city_id',
    //         10=>'region',
    //         11=>'title',
    //         12=>'lat',
    //         13=>'lang',
    //         // 12 => 'created_at',
    //     ];

    //     $search = $request->input('search.value');
    //     $categoryId = $request->input('category_id');
    //     $hospitalId = $request->hospital_id;


    //     $totalData = Doctor::count();

    //     // $query = Doctor::with('service','insurances','treatments','cases','city','hospitals')
    //     //     ->orderBy($columns[$request->input('order.0.column')], $request->input('order.0.dir'));
    //     $query = Doctor::with('service', 'insurances', 'treatments', 'cases', 'city', 'hospitals')
    //     ->orderBy($columns[$request->input('order.0.column')], $request->input('order.0.dir'));
    
    // if ($hospitalId != 0) {
    //     $query->whereHas('hospitals', function ($subQuery) use ($hospitalId) {
    //         $subQuery->where('hospital_id', $hospitalId);
    //     });
    // }
    
    // // $result = $query->get();
    
    // // ->get();


    //     // Filter by category if a category ID is provided
    //     if (!empty($categoryId)) {
    //         $query->where('category_id', $categoryId);
    //     }
    //     // if ($hospitalId!=0) {
    //     //     $query->where('hospital_id', $hospitalId);
    //     // }

    //     $totalFiltered = $query->count();
    //     $limit = $request->input('length');
    //     $start = $request->input('start');
    //     $doctors= $query->skip($start)->take($limit)->get();

    //     $data = [];

    //     if (!empty($doctors)) {
    //         $ids = $start;

    //         log::info($doctors);
    //         foreach ($doctors as $doctor) {
    //             $nestedData['id'] = $doctor->id;
    //             $nestedData['fake_id'] = ++$ids;
    //             $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
    //             $nestedData['first_name'] = $doctor->first_name;
    //             $nestedData['last_name'] = $doctor->getTranslation('last_name', app()->getLocale(Config::get('app.locale')));
    //             $nestedData['title'] = $doctor->getTranslation('title', app()->getLocale(Config::get('app.locale')));
    //             $nestedData['email'] = $doctor->email;
    //             $nestedData['gender'] = $doctor->gender;
    //             $nestedData['Phone'] = $doctor->Phone;
    //             $nestedData['description'] = $doctor->description;
    //             $nestedData['is_trainer'] = $doctor->is_trainer;
    //             $nestedData['area_id'] = $doctor->area ? $doctor->area->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
    //             $nestedData['lat'] = $doctor->lat;
    //             $nestedData['lang'] = $doctor->lang;
    //             // $nestedData['city_id'] = $doctor->city->name;
    //             $nestedData['city_id'] = $doctor->city ? $doctor->city->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
    //             $data[] = $nestedData;
    //         }
    //     }

    //     if ($data) {
    //         return response()->json([
    //             'draw' => intval($request->input('draw')),
    //             'recordsTotal' => intval($totalData),
    //             'recordsFiltered' => intval($totalFiltered),
    //             'code' => 200,
    //             'data' => $data,
    //             'parent_categories'=>$parent_categories,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'message' => 'Internal Server Error',
    //             'code' => 500,
    //             'data' => [],
    //         ]);
    //     }
    // }
 

    /**
     * Show the form for creating a new resource.
     */
    
     public function create(Request $request)
     {

        if($request->service_id)
        {
            $services = Service::whereId($request->service_id)->with('media')->first();
            return view('backend.services.form'
            ,compact('services')
        );
        }
        else{
            return view('backend.services.form');
        }

     }
    public function index()
    {
        $services = Service::with('media')->first();
        return view('backend.services.index',compact('services'));
    }
    public function services_api(Request $request)
    {
        $columns = [
            1 => 'id',
            2 => 'title',
            2 => 'description',
            4 => 'created_at',
        ];

        $search = [];

        $totalData = Service::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $servicesQuery = Service::query();

        if (empty($request->input('search.value'))) {
            $services = $servicesQuery
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $services = $servicesQuery
                ->where(function($query) use ($search) {
                    $query->where('id', 'LIKE', "%{$search}%")
                        ->orWhere('title->ar', 'LIKE', "%{$search}%")
                        ->orWhere('title->ar', 'LIKE', "%{$search}%")
                        ->orWhere('description->ar', 'LIKE', "%{$search}%")
                        ->orWhere('description->en', 'LIKE', "%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = $servicesQuery
                ->where(function($query) use ($search) {
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('title->ar', 'LIKE', "%{$search}%")
                    ->orWhere('title->ar', 'LIKE', "%{$search}%")
                    ->orWhere('description->ar', 'LIKE', "%{$search}%")
                    ->orWhere('description->en', 'LIKE', "%{$search}%");
                })
                ->count();
        }

        $data = [];

        if (!empty($services)) {
            // providing a dummy id instead of database ids
            $ids = $start;

            foreach ($services as $service) {
                $nestedData['id'] = $service->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['title'] = $service->getTranslation('title', app()->getLocale(Config::get('app.locale')));
                $nestedData['description'] = $service->getTranslation('description', app()->getLocale(Config::get('app.locale')));
                $nestedData['created_at'] = $service->created_at->format('M Y');

                $data[] = $nestedData;
            }
        }

        if ($data) {
            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => intval($totalData),
                'recordsFiltered' => intval($totalFiltered),
                'code' => 200,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500,
                'data' => [],
            ]);
        }
    }
    // public function create()
    // {
    //     $services = Service::with('media')->first();
    //     return view('backend.services.form',compact('services'));
    // }
    public function store(Request $request)
    {
        log::info($request->all());
        $data['title'] = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $data['description'] = ['en' => $request->description_en, 'ar' => $request->description_ar];
        // $data['footer_text'] = ['en' => $request->footer_text_en, 'ar' => $request->footer_text_ar];
      
            $services = Service::create($data);
      if($request->service_id){
            $services = Service::where('id', $request->service_id)->first();
            $services->update($data);
        }
        if ($request->hasFile('service_image')) {
            $services->clearMediaCollection('service_image');
            $services->addMedia($request->file('service_image'))->toMediaCollection('service_image');
        }
        
        // if($request->file1){
        //     $settings->clearMediaCollection('section3_file1');
        //     $settings->addMedia($request->file('file1'))->toMediaCollection('section3_file1');
        // }
        // if($request->file2){
        //     $settings->clearMediaCollection('section3_file2');
        //     $settings->addMedia($request->file('file2'))->toMediaCollection('section3_file2');
        // }
        return response()->json(['message'=>__('cp.update')]);
    }
    public function show(Request $request)
    {
        $services = Service::with('media')->first();

        return response()->json(['services'=>$services]);
    }
}
