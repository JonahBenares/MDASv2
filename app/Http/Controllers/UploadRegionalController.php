<?php

namespace App\Http\Controllers;

use App\Models\UploadRegional;
use App\Models\Region;
use App\Models\Commodity;
use Illuminate\Http\Request;
use App\Imports\ImportRegional;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
ini_set('max_execution_time', 10000);
ini_set('max_input_vars', 100000);
class UploadRegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $region_list=Region::all();
        $commodity_list=Commodity::all()->sortBy('commodity_name');
        $check_exist = Commodity::pluck('commodity_code')->all();
        $check_user=UploadRegional::where('upload_by',Auth::id())->whereNotIn('commodity_type', $check_exist)->count();
        $checker = UploadRegional::where('upload_by',Auth::id())->whereNotIn('commodity_type', $check_exist)->select('commodity_type')->distinct('commodity_type')->orderBy('commodity_type','ASC')->get();
        return view('upload_regional.index',compact('region_list','commodity_list','check_user','checker'));
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
        $identifiers=generateRandomString();
        $data=[
            'identifier'=>$identifiers,
            'upload_by'=>$request->user_id
        ];
        Excel::import(new ImportRegional($data), request()->file('reg_sum'));
        echo $identifiers;
    }

    /**
     * Display the specified resource.
     */
    public function show($identifier)
    {
        $regional=UploadRegional::where('identifier',$identifier)->get();
        return view('upload_regional.show',compact('regional'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UploadRegional $uploadRegional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UploadRegional $uploadRegional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UploadRegional $uploadRegional)
    {
        //
    }
}
