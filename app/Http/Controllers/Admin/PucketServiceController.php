<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PucketService;
use App\Models\Pucket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PucketServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puckets = Pucket::all();
        return view('backend.puckets.services.index', compact('puckets'));
    }

    public function pucketServices_api(Request $request)
    {
        $columns = [
            1 => 'id',
            2 => 'title',
            3 => 'description',
            3 => 'price',
            3 => 'discount',
            3 => 'pucket_id',
            4 => 'created_at',
        ];

        $search = [];

        $totalData = PucketService::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $pucketServicesQuery = PucketService::query();

        if (empty($request->input('search.value'))) {
            $pucketServices = $pucketServicesQuery
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $pucketServices = $pucketServicesQuery
                ->where(function($query) use ($search) {
                    $query->where('id', 'LIKE', "%{$search}%")
                        ->orWhere('title->ar', 'LIKE', "%{$search}%")
                        ->orWhere('title->en', 'LIKE', "%{$search}%")
                        ->orWhere('description->ar', 'LIKE', "%{$search}%")
                        ->orWhere('description->en', 'LIKE', "%{$search}%")
                        ->orWhere('price', 'LIKE', "%{$search}%")
                        ->orWhere('discount', 'LIKE', "%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = $pucketServicesQuery
                ->where(function($query) use ($search) {
                    $query->where('id', 'LIKE', "%{$search}%")
                        ->orWhere('title->ar', 'LIKE', "%{$search}%")
                        ->orWhere('title->en', 'LIKE', "%{$search}%")
                        ->orWhere('description->ar', 'LIKE', "%{$search}%")
                        ->orWhere('description->en', 'LIKE', "%{$search}%")
                        ->orWhere('price', 'LIKE', "%{$search}%")
                        ->orWhere('discount', 'LIKE', "%{$search}%");

                })
                ->count();
        }

        $data = [];

        if (!empty($pucketServices)) {
            // providing a dummy id instead of database ids
            $ids = $start;

            foreach ($pucketServices as $service) {
                $nestedData['id'] = $service->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['title'] = $service->title;
                $nestedData['description'] = $service->description;
                $nestedData['price'] = $service->price;
                $nestedData['discount'] = $service->discount;
                $nestedData['pucket_id'] = $service->pucket_id;
                $nestedData['pucket'] = $service->pucket ? $service->pucket->title : '';
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pucketServiceId = $request->id;
        $existingpucketService = PucketService::find($pucketServiceId);

        $commonRules = [
            'title_ar' => 'required|unique:pucket_services,title->ar,'. $pucketServiceId,
            'title_en' => 'required|unique:pucket_services,title->en,'. $pucketServiceId,
            'pucket_id' => 'required',
        ];

        // Add the 'required' rule for 'image' for store operation
        $storeRules = $commonRules + [
                //      'image' => 'required',
            ];

        // Apply the appropriate validation rules based on the operation
        $request->validate($pucketServiceId ? $commonRules : $storeRules);

        $data['title'] = ['en' => $request->title_en, 'ar'  => $request->title_ar];
        $data['description'] = ['en' => $request->description_en, 'ar'  => $request->description_ar];
        $data['price'] = $request->price;
        $data['discount'] = $request->discount;
        $data['pucket_id'] = $request->pucket_id;
        if ($pucketServiceId) {
            // update the value
            $pucketService = PucketService::whereId($pucketServiceId)->firstOrFail();

            $pucketService->update($data);

            // user updated
            return response()->json(__('cp.update'));
        } else {
            // create new one if email is unique
            $pucketService = PucketService::where('id', $request->id)->first();

            if (empty($pucketService)) {
                $pucketService = PucketService::create($data);

                return response()->json(__('cp.create'));
            } else {
                // pucketService Already exist
                return response()->json(['message' => "Already exits"], 422);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PucketService $pucketService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PucketService $pucketService)
    {
        return response()->json($pucketService);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PucketService $pucketService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PucketService $pucketService)
    {
        $pucketService->delete();
        return 'pucketService deleted';
    }
}
