<?php

namespace App\Http\Controllers;

use App\Models\ReportRegional;
use App\Models\UploadRegional;
use App\Models\Grid;
use Illuminate\Http\Request;
ini_set('max_execution_time', 10000);
ini_set('max_input_vars', 100000);
class ReportRegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grid=Grid::all()->sortBy('grid_name');
        return view('report_regional.index',compact('grid'));
    }

    public function filter_regionalload(Request $request){
        if(!empty($request->date)){
            $date=$request->date;
        }else{
            $date='';
        }

        if(!empty($request->grid)){
            $grid_disp=$request->grid;
        }else{
            $grid_disp='';
        }
        
        $grid=Grid::all()->sortBy('grid_name');
        $loadArray = [];
        
        $regional_load=UploadRegional::select(['time_interval','region_name','commodity_type','demand','generation','losses','import','export','grid_id'])->when((!empty($date)), function ($q) use ($date) {
            return $q->whereDate('run_time',$date);
        })->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
            return $q->where('grid_id',$grid_disp);
        })->groupBy('time_interval')->chunk(100, function($loadsched) use(&$loadArray) {
            foreach ($loadsched as $ls) {
                $loadArray[] = $ls;
            }
        });
        return view('report_regional.index',compact('regional_load','grid','loadArray'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ReportRegional $reportRegional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportRegional $reportRegional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportRegional $reportRegional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportRegional $reportRegional)
    {
        //
    }
}
