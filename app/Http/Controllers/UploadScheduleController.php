<?php

namespace App\Http\Controllers;

use App\Models\UploadSchedule;
use Illuminate\Http\Request;
use App\Imports\ImportSchedule;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class UploadScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('upload_schedule.index');
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
            'run_hour'=>$request->run_hour,
            'grid_id'=>1,
            'resource_id'=>1,
            'resource_type_id'=>1,
            'upload_by'=>0
        ];
        Excel::import(new ImportSchedule($data), request()->file('mpsl'));
    }

    /**
     * Display the specified resource.
     */
    public function show(UploadSchedule $id)
    {
        return view('upload_schedule.show',$id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UploadSchedule $uploadSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UploadSchedule $uploadSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UploadSchedule $uploadSchedule)
    {
        //
    }
}
