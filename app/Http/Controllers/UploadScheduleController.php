<?php

namespace App\Http\Controllers;

use App\Models\UploadSchedule;
use App\Models\UploadScheduleTemp;
use App\Models\ResourceType;
use App\Models\PowerplantResource;
use App\Models\Powerplant;
use Illuminate\Http\Request;
use App\Imports\ImportSchedule;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class UploadScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $check_user=UploadScheduleTemp::where('upload_by',Auth::id())->count();
        $check_resource=PowerplantResource::all();
        $powerplant=Powerplant::all()->sortBy('facility_name');
        foreach($check_resource AS $c){
            $checker=UploadScheduleTemp::where('resource_name','!=',$c->resource_id)->distinct()->get(['resource_name']);
        }
        return view('upload_schedule.index',compact('checker','check_resource','check_user','powerplant'));
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
            'upload_by'=>$request->user_id
        ];
        Excel::import(new ImportSchedule($data), request()->file('mpsl'));
        return redirect()->route('uploadschedules.index');
    }

    public function saveall(Request $request){
        $saveall=UploadSchedule::where('upload_by',Auth::id())->get();
        foreach($saveall AS $sa){
            $resource_type_count=ResourceType::where('resource_code',$sa->resource_type)->count();
            $resource_count=PowerplantResource::where('resource_id',$sa->resource_name)->count();
            if($resource_type_count==0){
                ResourceType::create([
                    'resource_code'=>$row['resource_type'],
                    'resource_name'=>''
                ]);
            }
            $resource_type_id=ResourceType::where('resource_code',$sa->resource_type)->value('id');
            $save=UploadSchedule::create([
                'run_time'=>$sa->run_time,
                'run_hour'=>$sa->run_hour,
                'mkt_type'=>$sa->mkt_type,
                'time_interval'=>$sa->time_interval,
                'region_name'=>$sa->region_name,
                'grid_id'=> $sa->grid_id,
                'resource_name'=>$sa->resource_name,
                'resource_id'=> $sa->resource_id,
                'resource_type'=>$sa->resource_type,
                'resource_type_id'=> $resource_type_id,
                'schedule_mw'=>$sa->schedule_mw,
                'lmp'=>$sa->lmp,
                'loss_factor'=>$sa->loss_factor,
                'lmp_smp'=>$sa->lmp_smp,
                'lmp_loss'=>$sa->lmp_loss,
                'congestion'=>$sa->lmp_congestion,
                'upload_by'=>$sa->upload_by
            ]);
            if($save){
                UploadScheduleTemp::find($sa->id)->delete();
            }
        }   
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
