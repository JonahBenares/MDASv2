<?php

namespace App\Http\Controllers;

use App\Models\ReportActualOutages;
use App\Models\UploadSchedule;
use App\Models\Grid;
use App\Models\PowerplantResource;
use App\Models\PowerPlant;
use App\Models\PowerPlantType;
use Illuminate\Http\Request;

class ReportActualOutagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grid=Grid::all()->sortBy('grid_name');
        $powerplant_resource=PowerplantResource::all()->unique('resource_id')->sortBy('resource_id');
        return view('report_actual_outages.index',compact('grid','powerplant_resource'));
    }

    public function filter_actualoutagesload(Request $request){
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

        if(!empty($request->powerplant_type)){
            $powerplant_type_disp=$request->powerplant_type;
        }else{
            $powerplant_type_disp='';
        }
        
        $grid=Grid::all()->sortBy('grid_name');
        $powerplant_resource=PowerplantResource::all()->unique('resource_id')->sortBy('resource_id');
        $loadArray = [];
        
        $actualoutages_load=UploadSchedule::select(['id','time_interval','region_name','resource_name','schedule_mw','pp_type_id','outages_type','remarks','outage'])->when((!empty($date)), function ($q) use ($date) {
            return $q->whereDate('run_time',$date);
        })->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
            return $q->where('grid_id',$grid_disp);
        })->when((!empty($powerplant_type_disp)), function ($q) use ($powerplant_type_disp) {
            return $q->where('pp_type_id',$powerplant_type_disp);
        })->groupBy(['run_hour','resource_name', 'pp_type_id'])->where('resource_type','G')->where('schedule_mw','0')->orWhere('outage', '=', 1)->chunk(100, function($loadsched) use(&$loadArray) {
            foreach ($loadsched as $ls) {
                $loadArray[] = $ls;
            }
        });

        return view('report_actual_outages.index',compact('actualoutages_load','grid','powerplant_resource','loadArray'));
    }

    public function updateoutages(Request $request)
    {
        $id = $request->outages_id;
        $outages = UploadSchedule::find($id);
        $outages->update(
            [
                'outages_type' => $request->type,
                'remarks' => $request->remarks,
            ]
        );
        
    }


    public function fetchAdd(Request $request)
    {
        $exp=explode('-',$request->powerplant_id);
        $capacity_dependable = PowerPlant::where('id',$exp[2])->value('capacity_dependable');
        $pp_type_id = PowerPlant::where('id',$exp[2])->value('pp_type_id');
        $type_name = PowerPlantType::where('id',$pp_type_id)->value('type_name');
        echo number_format($capacity_dependable,2)."|".$type_name;
    }

    public function insertNewOutage(Request $request)
    {
        $grid=explode('-',$request->grid);
        $grid_id = $grid[0];
        $grid_code = $grid[1];
        $reource=explode('-',$request->resource_id);
        $resource_id=$reource[0];
        $resource_name=$reource[1];
        $res=UploadSchedule::create([
            'grid_id'=> $grid_id,
            'grid_name'=> $grid_code,
            'time_interval'=> $request->outage_date,
            'resource_id'=> $resource_id,
            'resource_name'=> $resource_name,
            'time_interval'=> $request->outage_date,
            'outages_type'=> $request->outage_type,
            'remarks'=> $request->remarks,
            'outage'=> 1,
        ]);
        // if($res){
        //     return redirect()->route('showResource',['id'=>$res,'count'=>$request->number_of_units]);
        // }else{
        //     return redirect()->route('showResource',['id'=>$res,'count'=>$request->number_of_units]);
        // }
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
    public function show(ReportActualOutages $reportActualOutages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportActualOutages $reportActualOutages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportActualOutages $reportActualOutages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportActualOutages $reportActualOutages)
    {
        //
    }
}
