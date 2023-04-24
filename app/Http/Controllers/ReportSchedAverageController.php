<?php

namespace App\Http\Controllers;

use App\Models\ReportSchedAverage;
use App\Models\UploadSchedule;
use App\Models\PowerplantType;
use App\Models\PowerplantResource;
use App\Models\ResourceType;
use App\Models\Grid;
use Illuminate\Http\Request;

class ReportSchedAverageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grid=Grid::all()->sortBy('grid_name');
        $resource_type=ResourceType::all()->sortBy('resource_code');
        $powerplant_resource=PowerplantResource::all()->unique('resource_id')->sortBy('resource_id');
        $powerplant_type=PowerplantType::all()->sortBy('type_name');
        return view('report_sched_average.index',compact('powerplant_type','grid','resource_type','powerplant_resource'));
    }

    public function filter_scheduleloadavg(Request $request){
        if(!empty($request->interval_from) && !empty($request->interval_to)){
            $interval_from=$request->interval_from;
            $interval_to=$request->interval_to;
        }else{
            $interval_from='';
            $interval_to='';
        }

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

        if(!empty($request->resource_type)){
            $resourcetype=$request->resource_type;
        }else{
            $resourcetype='';
        }

        if(!empty($request->resource_id)){
            $resource_id=$request->resource_id;
        }else{
            $resource_id='';
        }

        if(!empty($request->powerplant_type)){
            $powerplant_type_disp=$request->powerplant_type;
        }else{
            $powerplant_type_disp='';
        }

        if(!empty($request->inex)){
            if($request->inex==0){
                $inex=0;
            }else{
                $inex=1;
            }
        }else{
            $inex='';
        }
        
        $grid=Grid::all()->sortBy('grid_name');
        $resource_type=ResourceType::all()->sortBy('resource_code');
        $powerplant_resource=PowerplantResource::all()->unique('resource_id')->sortBy('resource_id');
        $powerplant_type=PowerplantType::all()->sortBy('type_name');
        // $interval_hours=UploadSchedule::select(['run_hour'])->whereBetween('run_hour',[$interval_from,$interval_to])->groupBy('run_hour')->get();
        // $schedule_load=UploadSchedule::select(['run_hour','region_name','resource_type','resource_name'])->whereBetween('run_hour',[$interval_from,$interval_to])->groupBy('resource_name')->get();
        $loadArray = [];
        $loadintervalArray = [];
        $interval_hours=UploadSchedule::select(['run_hour'])->when((!empty($interval_from) && !empty($interval_to)), function ($q) use ($interval_from,$interval_to) {
            return $q->whereBetween('run_hour',[$interval_from,$interval_to]);
        })->when((!empty($date)), function ($q) use ($date) {
            return $q->whereDate('run_time',$date);
        })->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
            return $q->where('grid_id',$grid_disp);
        })->when((!empty($resourcetype)), function ($q) use ($resourcetype) {
            return $q->where('resource_type_id',$resourcetype);
        })->when((!empty($resource_id)), function ($q) use ($resource_id) {
            return $q->where('resource_id',$resource_id);
        })->when((!empty($powerplant_type_disp)), function ($q) use ($powerplant_type_disp) {
            return $q->where('pp_type_id',$powerplant_type_disp);
        })->groupBy('run_hour')->chunk(100, function($loadinterval) use(&$loadintervalArray) {
            foreach ($loadinterval as $li) {
                $loadintervalArray[] = $li;
            }
        });
        
        $schedule_load=UploadSchedule::select(['run_hour','region_name','resource_type','resource_name','time_interval'])->when((!empty($interval_from) && !empty($interval_to)), function ($q) use ($interval_from,$interval_to) {
            return $q->whereBetween('run_hour',[$interval_from,$interval_to]);
        })->when((!empty($date)), function ($q) use ($date) {
            return $q->whereDate('run_time',$date);
        })->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
            return $q->where('grid_id',$grid_disp);
        })->when((!empty($resourcetype)), function ($q) use ($resourcetype) {
            return $q->where('resource_type_id',$resourcetype);
        })->when((!empty($resource_id)), function ($q) use ($resource_id) {
            return $q->where('resource_id',$resource_id);
        })->when((!empty($powerplant_type_disp)), function ($q) use ($powerplant_type_disp) {
            return $q->where('pp_type_id',$powerplant_type_disp);
        })->groupBy('resource_name')->chunk(100, function($loadsched) use(&$loadArray) {
            foreach ($loadsched as $ls) {
                $loadArray[] = $ls;
            }
        });
        // $interval_hours=UploadSchedule::select(['run_hour'])->whereBetween('run_hour',[$interval_from,$interval_to])->orWhere('grid_id',$grid_disp)->orWhere('resource_type_id',$resourcetype)->orWhere('resource_id',$resource_id)->orWhere('schedule_mw',$where,$inex)->orWhere('run_time','LIKE',"%{$date}%")->groupBy('run_hour')->chunk(100, function($loadinterval) use(&$loadintervalArray) {
        //     foreach ($loadinterval as $li) {
        //         $loadintervalArray[] = $li;
        //     }
        // });
        // $schedule_load=UploadSchedule::select(['run_hour','region_name','resource_type','resource_name','time_interval'])->whereBetween('run_hour',[$interval_from,$interval_to])->orWhere('grid_id',$grid_disp)->orWhere('resource_type_id',$resourcetype)->orWhere('resource_id',$resource_id)->orWhere('schedule_mw',$where,$inex)->orWhere('run_time','LIKE',"%{$date}%")->groupBy('resource_name')->chunk(100, function($loadsched) use(&$loadArray) {
        //     foreach ($loadsched as $ls) {
        //         $loadArray[] = $ls;
        //     }
        // });

        return view('report_sched_average.index',compact('powerplant_type','schedule_load','grid','resource_type','powerplant_resource','interval_hours','loadArray','loadintervalArray'));
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
    public function show(ReportSchedAverage $reportSchedAverage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportSchedAverage $reportSchedAverage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportSchedAverage $reportSchedAverage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportSchedAverage $reportSchedAverage)
    {
        //
    }
}
