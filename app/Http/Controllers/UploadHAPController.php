<?php

namespace App\Http\Controllers;

use App\Models\UploadHAP;
use App\Models\PriceNodes;
use Illuminate\Http\Request;
use App\Imports\ImportHap;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
ini_set('max_execution_time', 10000);
ini_set('max_input_vars', 100000);
class UploadHAPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('upload_hap.index');
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
        $data=[
            'upload_by'=>$request->user_id
        ];
        Excel::import(new ImportHap($data), request()->file('hap'));
    }

    /**
     * Display the specified resource.
     */
    public function show(UploadHAP $id)
    {
        return view('upload_hap.show',$id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UploadHAP $uploadHAP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UploadHAP $uploadHAP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UploadHAP $uploadHAP)
    {
        //
    }
}
