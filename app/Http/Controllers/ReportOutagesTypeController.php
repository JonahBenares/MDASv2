<?php

namespace App\Http\Controllers;

use App\Models\ReportOutagesType;
use App\Models\Grid;
use App\Models\UploadSchedule;
use App\Models\PowerPlant;
use App\Models\PowerPlantType;
use App\Models\PowerplantResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportOutagesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grid=Grid::all()->sortBy('grid_name');
        return view('report_outages_type.index',compact('grid'));
    }

    public function filter_outagetype(Request $request){
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
        $loadoutagetypeArray = [];
        $graph=UploadSchedule::select(['time_interval','resource_name','resource_id','pp_type_id','resource_type','resource_type_id','outage_type','remarks','run_hour','region_name','grid_id','run_time'])->where('resource_type','G')->where('schedule_mw','0')->when((!empty($date)), function ($q) use ($date) {
            return $q->whereDate('run_time',$date);
        })->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
            return $q->where('grid_id',$grid_disp);
        })->groupBy(DB::raw('hour(time_interval)'))->orderBy('time_interval','ASC')->get();
        $data = [];
        $powerplant_id=0;
        foreach($graph AS $g){
            $data['label'][] = date('H:i',strtotime($g->time_interval));
            //$data['label'][] = $g->run_hour;
            //$type_name = PowerplantType::where('id',$g->pp_type_id)->value('type_name');
            // echo $type_name."<br>";
            // $data['planned'][] = UploadSchedule::join('pp_resource','pp_resource.id','=','mpsl.resource_id')->join('powerplants','pp_resource.powerplant_id','=','powerplants.id')->where('outage_type','1')->where('run_hour',$g->run_hour)->where('powerplant_id',$powerplant_id)->when(($grid_disp), function ($q) use ($grid_disp) {
            //     return $q->where('mpsl.grid_id',$grid_disp);
            // })->groupBy(['run_time'])->value('capacity_dependable');
            
            //$powerplant_id = PowerplantResource::join('mpsl','mpsl.resource_name','=','pp_resource.resource_id')->where('run_time',$g->run_time)->where('run_hour',$g->run_hour)->where('outage_type','1')->where('pp_resource.resource_id',$g->resource_name)->where('region_name',$g->region_name)->value('powerplant_id');
            
            $data['planned'][] = UploadSchedule::join('pp_resource','pp_resource.id','=','mpsl.resource_id')->join('powerplants','pp_resource.powerplant_id','=','powerplants.id')->where('outage_type','1')->where('run_time',$g->run_time)->where('run_hour',$g->run_hour)->where('mpsl.grid_id',$g->grid_id)->groupBy(['run_time'])->sum('capacity_dependable');
            $data['unplanned'][] = UploadSchedule::join('pp_resource','pp_resource.id','=','mpsl.resource_id')->join('powerplants','pp_resource.powerplant_id','=','powerplants.id')->where('outage_type','2')->where('run_time',$g->run_time)->where('run_hour',$g->run_hour)->where('mpsl.grid_id',$g->grid_id)->groupBy(['run_time'])->sum('capacity_dependable');

            
            //$data['planned'][] = PowerPlant::where('id',$powerplant_id)->sum('capacity_dependable');
            // $data['unplanned'][] = UploadSchedule::join('pp_resource','pp_resource.id','=','mpsl.resource_id')->join('powerplants','pp_resource.powerplant_id','=','powerplants.id')->where('outage_type','2')->where("time_interval",$g->time_interval)->where('powerplant_id',$powerplant_id)->when(($grid_disp), function ($q) use ($grid_disp) {
            //     return $q->where('mpsl.grid_id',$grid_disp);
            // })->groupBy('time_interval')->sum('capacity_dependable');
            // $data['unplanned'][] = UploadSchedule::join('pp_resource','pp_resource.id','=','mpsl.resource_id')->join('powerplants','pp_resource.powerplant_id','=','powerplants.id')->where('outage_type','2')->where("time_interval",$g->time_interval)->when(($grid_disp), function ($q) use ($grid_disp) {
            //     return $q->where('mpsl.grid_id',$grid_disp);
            // })->groupBy(DB::raw('date(time_interval)'))->value('capacity_dependable');
        }
        $data['chart_data'] = json_encode($data, JSON_NUMERIC_CHECK);
        return view('report_outages_type.index',compact('loadoutagetypeArray','grid','data'));
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
    public function show(ReportOutagesType $reportOutagesType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportOutagesType $reportOutagesType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportOutagesType $reportOutagesType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportOutagesType $reportOutagesType)
    {
        //
    }
}
