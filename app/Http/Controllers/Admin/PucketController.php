<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pucket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PucketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.puckets.index');
    }

    public function puckets_api(Request $request)
    {
        $columns = [
            1 => 'id',
            2 => 'title',
            3 => 'description',
            4 => 'created_at',
        ];

        $search = [];

        $totalData = Pucket::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $pucketsQuery = Pucket::query();

        if (empty($request->input('search.value'))) {
            $puckets = $pucketsQuery
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $puckets = $pucketsQuery
                ->where(function($query) use ($search) {
                    $query->where('id', 'LIKE', "%{$search}%")
                        ->orWhere('title->ar', 'LIKE', "%{$search}%")
                        ->orWhere('title->en', 'LIKE', "%{$search}%")
                        ->orWhere('description->ar', 'LIKE', "%{$search}%")
                        ->orWhere('description->en', 'LIKE', "%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = $pucketsQuery
                ->where(function($query) use ($search) {
                    $query->where('id', 'LIKE', "%{$search}%")
                        ->orWhere('title->ar', 'LIKE', "%{$search}%")
                        ->orWhere('title->en', 'LIKE', "%{$search}%")
                        ->orWhere('description->ar', 'LIKE', "%{$search}%")
                        ->orWhere('description->en', 'LIKE', "%{$search}%");

                })
                ->count();
        }

        $data = [];

        if (!empty($puckets)) {
            // providing a dummy id instead of database ids
            $ids = $start;

            foreach ($puckets as $pucket) {
                $nestedData['id'] = $pucket->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['title'] = $pucket->title;
                $nestedData['description'] = $pucket->description;
                $nestedData['created_at'] = $pucket->created_at->format('M Y');

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
        $pucketId = $request->id;
        $existingpucket = Pucket::find($pucketId);

        $commonRules = [
            'title_ar' => 'required|unique:puckets,title->ar,'. $pucketId,
            'title_en' => 'required|unique:puckets,title->en,'. $pucketId,
            'pucket_key' => 'required',
        ];

        // Add the 'required' rule for 'image' for store operation
        $storeRules = $commonRules + [
                //      'image' => 'required',
            ];

        // Apply the appropriate validation rules based on the operation
        $request->validate($pucketId ? $commonRules : $storeRules);

        $data['title'] = ['en' => $request->title_en, 'ar'  => $request->title_ar];
        $data['description'] = ['en' => $request->description_en, 'ar'  => $request->description_ar];
        if ($pucketId) {
            // update the value
            $pucket = Pucket::whereId($pucketId)->firstOrFail();

            $pucket->update($data);

            // user updated
            return response()->json(__('cp.update'));
        } else {
            // create new one if email is unique
            $pucket = Pucket::where('id', $request->id)->first();

            if (empty($pucket)) {
                $pucket = Pucket::create($data);

                return response()->json(__('cp.create'));
            } else {
                // pucket Already exist
                return response()->json(['message' => "Already exits"], 422);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pucket $pucket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pucket $pucket)
    {
        return response()->json($pucket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pucket $pucket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pucket $pucket)
    {
        $pucket->delete();
        return 'pucket deleted';
    }
}
