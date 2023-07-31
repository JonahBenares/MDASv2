<?php

namespace App\Http\Controllers;

use App\Models\ReportRegionalAverage;
use App\Models\UploadRegional;
use App\Models\Grid;
use Illuminate\Http\Request;

class ReportRegionalAverageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regional_load=UploadRegional::all();
        $grid=Grid::all()->sortBy('grid_name');
        return view('report_regional_average.index',compact('regional_load','grid'));
    }
    
    public function filter_regionalavgload(Request $request){
        $grid=Grid::all()->sortBy('grid_name');
        if(!empty($request->grid)){
            $grid_disp=$request->grid;
        }else{
            $grid_disp='';
        }
        if(!empty($request->date)){
            $date=$request->date;
        }else{
            $date='';
        }
        $loadregionalArray = [];
        UploadRegional::select(['time_interval','commodity_id','grid_id','run_time','demand','generation','losses','import','export'])->when((!empty($date)), function ($q) use ($date) {
            return $q->whereDate('run_time',$date);
        })->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
            return $q->where('grid_id',$grid_disp);
        })->groupBy('time_interval')->chunk(100, function($loadregional) use(&$loadregionalArray) {
            foreach ($loadregional as $li) {
                $loadregionalArray[] = $li;
            }
        });
        return view('report_regional_average.index',compact('loadregionalArray','grid'));
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
    public function show(ReportRegionalAverage $reportRegionalAverage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportRegionalAverage $reportRegionalAverage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportRegionalAverage $reportRegionalAverage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportRegionalAverage $reportRegionalAverage)
    {
        //
    }
}
