<?php

namespace App\Http\Controllers;
use App\Models\ReportSchedule;
use App\Models\UploadSchedule;
use App\Models\PowerplantType;
use App\Models\PowerplantResource;
use App\Models\ResourceType;
use App\Models\Grid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
ini_set('max_execution_time', 10000);
ini_set('max_input_vars', 100000);
class ReportScheduleWeeklyController extends Controller
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
        $schedule_load=UploadSchedule::all()->unique('resource_name');
        return view('report_sched_weekly.index',compact('powerplant_type','schedule_load','grid','resource_type','powerplant_resource'));
    }

    public function filter_scheduleloadweekly(Request $request){
        if(!empty($request->date_from) && !empty($request->date_to)){
            $date_from=$request->date_from;
            $date_to=$request->date_to;
        }else{
            $date_from='';
            $date_to='';
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
        $loadArray = [];
        $loadintervalArray = [];
        $interval_hours=UploadSchedule::select(['run_hour'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
            return $q->whereBetween(DB::raw('DATE(run_time)'),[$date_from,$date_to]);
        })->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
            return $q->where('grid_id',$grid_disp);
        })->when((!empty($resourcetype)), function ($q) use ($resourcetype) {
            return $q->where('resource_type_id',$resourcetype);
        })->when((!empty($resource_id)), function ($q) use ($resource_id) {
            return $q->where('resource_id',$resource_id);
        })->when((!empty($powerplant_type_disp)), function ($q) use ($powerplant_type_disp) {
            return $q->where('pp_type_id',$powerplant_type_disp);
        })->when(($inex==0 && !empty($inex)), function ($q){
            return $q->where('schedule_mw','=','0')->whereOr('schedule_mw','!=','0');
        })->when(($inex==1 && !empty($inex)), function ($q){
            return $q->where('schedule_mw','!=','0');
        })->groupBy('run_hour')->orderBy('run_hour','ASC')->chunk(100, function($loadinterval) use(&$loadintervalArray) {
            foreach ($loadinterval as $li) {
                $loadintervalArray[] = $li;
            }
        });
        
        $schedule_load=UploadSchedule::select(['run_hour','region_name','resource_type','resource_name','time_interval'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
            return $q->whereBetween(DB::raw('DATE(run_time)'),[$date_from,$date_to]);
        })->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
            return $q->where('grid_id',$grid_disp);
        })->when((!empty($resourcetype)), function ($q) use ($resourcetype) {
            return $q->where('resource_type_id',$resourcetype);
        })->when((!empty($resource_id)), function ($q) use ($resource_id) {
            return $q->where('resource_id',$resource_id);
        })->when((!empty($powerplant_type_disp)), function ($q) use ($powerplant_type_disp) {
            return $q->where('pp_type_id',$powerplant_type_disp);
        })->when(($inex==0 && !empty($inex)), function ($q){
            return $q->where('schedule_mw','=','0')->whereOr('schedule_mw','!=','0');
        })->when(($inex==1 && !empty($inex)), function ($q){
            return $q->where('schedule_mw','!=','0');
        })->groupBy('resource_name')->orderBy('resource_name','ASC')->chunk(100, function($loadsched) use(&$loadArray) {
            foreach ($loadsched as $ls) {
                $loadArray[] = $ls;
            }
        });
        return view('report_sched_weekly.index',compact('powerplant_type','schedule_load','grid','resource_type','powerplant_resource','interval_hours','loadArray','loadintervalArray'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
