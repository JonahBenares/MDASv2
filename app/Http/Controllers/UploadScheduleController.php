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
ini_set('max_execution_time', 10000);
ini_set('max_input_vars', 100000);
class UploadScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $check_resource=PowerplantResource::all();
        $powerplant=Powerplant::all()->sortBy('facility_name');
        $check_exist = PowerplantResource::pluck('resource_id')->all();
        $check_user=UploadScheduleTemp::where('upload_by',Auth::id())->whereNotIn('resource_name', $check_exist)->count();
        $checker = UploadScheduleTemp::where('upload_by',Auth::id())->whereNotIn('resource_name', $check_exist)->select('resource_name')->distinct('resource_name')->orderBy('resource_name','ASC')->get();
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
        //return redirect()->route('uploadschedules.index');
    }

    public function insertpowerplant(Request $request){
        $operator = $request->operator;
        $powerplant_id=Powerplant::insertGetId([
           'operator'=>$operator,
           'status'=>'Active'
        ]);
        echo $powerplant_id;
    }

    public function saveall(Request $request){
        $check_exist = PowerplantResource::all();
        $data=UploadScheduleTemp::where('upload_by',Auth::id())->chunk(500, function($saveall) use($request,&$save) {
            $x=0;
            $data_insert=[];
            $id=[];
            foreach($saveall AS $sa){
                $resource_type_count=ResourceType::where('resource_code',$sa->resource_type)->count();
                $resource_count=PowerplantResource::where('resource_id',$sa->resource_name)->count();
                if($resource_type_count==0){
                    $id=ResourceType::create([
                        'resource_code'=>$sa->resource_type,
                        'resource_name'=>''
                    ]);
                }
                $isExist = PowerplantResource::where('resource_id',$request->main_resource[$x])->doesntExist();
                if($isExist){
                    if($request->powerplant[$x]!=''){
                        PowerplantResource::create([
                            'powerplant_id'=>$request->powerplant[$x],
                            'resource_id'=>$request->main_resource[$x],
                        ]);
                    }
                }
                $resource_id=0;
                if($request->resource_name[$x]!=''){
                    $resource_id=$request->resource_name[$x];
                    $resource_name=PowerplantResource::where('id',$resource_id)->value('resource_id');
                }else{
                    $resource_id=PowerplantResource::where('resource_id',$sa->resource_name)->value('id');
                    $resource_name=$sa->resource_name;
                }

               
                $resource_type_id=ResourceType::where('resource_code',$sa->resource_type)->value('id');
                $data_insert[] =[
                    'run_time'=>$sa->run_time,
                    'run_hour'=>$sa->run_hour,
                    'mkt_type'=>$sa->mkt_type,
                    'time_interval'=>$sa->time_interval,
                    'region_name'=>$sa->region_name,
                    'grid_id'=> $sa->grid_id,
                    'resource_name'=>$resource_name,
                    'resource_id'=> ($resource_id!=0) ? $resource_id : 0,
                    'resource_type'=>$sa->resource_type,
                    'resource_type_id'=> $resource_type_id,
                    'schedule_mw'=>$sa->schedule_mw,
                    'lmp'=>$sa->lmp,
                    'loss_factor'=>$sa->loss_factor,
                    'lmp_smp'=>$sa->lmp_smp,
                    'lmp_loss'=>$sa->lmp_loss,
                    'congestion'=>$sa->congestion,
                    'upload_by'=>$sa->upload_by,
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                ];
                $x++;
            }   
            $save=UploadSchedule::insert($data_insert);
        });
        if($save){
            $sched = UploadSchedule::select('id')->where('upload_by',Auth::id())->get();
            UploadScheduleTemp::whereIn('id', $sched->pluck('id'))->delete();
            return redirect()->route('uploadschedules.index');
        }
    }

    public function cancelschedule(){
        $sched = UploadScheduleTemp::where('upload_by',Auth::id())->get();
        UploadScheduleTemp::whereIn('id', $sched->pluck('id'))->delete();
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
