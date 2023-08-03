<?php

namespace App\Http\Controllers;

use App\Models\UploadSchedule;
use App\Models\UploadScheduleTemp;
use App\Models\ResourceType;
use App\Models\PowerplantResource;
use App\Models\Powerplant;
use App\Models\PowerplantType;
use App\Models\Grid;
use Illuminate\Http\Request;
use App\Imports\ImportSchedule;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
ini_set('max_execution_time', 10000);
ini_set('max_input_vars', 100000);
ini_set('memory_limit', -1);

class UploadScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $check_resource=PowerplantResource::all()->unique('resource_id');
        $powerplant=Powerplant::all()->sortBy('facility_name');
        $check_exist = PowerplantResource::pluck('resource_id')->all();
        $check_user=UploadScheduleTemp::where('resource_type','G')->where('upload_by',Auth::id())->whereNotIn('resource_name', $check_exist)->count();
        $check_user_exist=UploadScheduleTemp::where('resource_type','G')->where('upload_by',Auth::id())->count();
        $checker = UploadScheduleTemp::where('resource_type','G')->where('upload_by',Auth::id())->whereNotIn('resource_name', $check_exist)->select('resource_name','id')->groupBy('resource_name')->get();
        return view('upload_schedule.index',compact('checker','check_resource','check_user','check_user_exist','powerplant'));
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
        
        $imp_runhour=implode(',',$request->run_hour);
        $run_hour=explode(',',$imp_runhour);
        $identifier=generateRandomString();
        $data_temp=array();
        $data_final=array();
        foreach ($request->mpsl as $keys => $values) {
            //echo $run_hour[$keys];
            //echo $keys;
            $rows = array_map('str_getcsv',file($request->mpsl[$keys]));
            $header = array_shift($rows);
            foreach ($rows as $row) {
                if($row[0]!='EOF'){
                    $row = array_combine($header, $row);

                    $res_name = str_replace(' ','',$row['RESOURCE_NAME']);
                    $res_type = str_replace(' ','',$row['RESOURCE_TYPE']);
                    $resource_type_id_temp=ResourceType::where('resource_code',$row['RESOURCE_TYPE'])->value('id');
                    $grid_id=Grid::where('grid_code',$row['REGION_NAME'])->value('id');
                    $resource_id_temp=PowerplantResource::where('resource_id',$res_name)->value('id');
                    $powerplant_id= PowerplantResource::where("resource_id",$res_name)->value('powerplant_id');
                    $pp_type_id= Powerplant::join('pp_type','pp_type.id','=','powerplants.pp_type_id')->where("powerplants.id",$powerplant_id)->value('powerplants.pp_type_id');
                    //$id= PowerplantType::where("id",$pp_type_id)->value('id');

                    //$check_exist = PowerplantResource::pluck('resource_id')->toArray();
                    $count=PowerplantResource::where('resource_id', $res_name)->count();
                   // echo $count . " " . $res_type . "<br>";
                    if($count==0 && $res_type == 'G'){

                     
                        $data_temp[]=[
                            'run_time'=>date('Y-m-d H:i',strtotime($row['RUN_TIME'])),
                            'run_hour'=>$run_hour[$keys],
                            'mkt_type'=>$row['MKT_TYPE'],
                            'time_interval'=>date('Y-m-d H:i',strtotime($row['TIME_INTERVAL'])),
                            'region_name'=>$row['REGION_NAME'],
                            'grid_id'=>(!empty($grid_id)) ? $grid_id : 0,
                            'resource_name'=>$res_name,
                            'resource_id'=>  (!empty($resource_id_temp)) ? $resource_id_temp : 0,
                            'resource_type'=>$row['RESOURCE_TYPE'],
                            'resource_type_id'=> (!empty($resource_type_id_temp)) ? $resource_type_id_temp : 0,
                            'pp_type_id'=> (!empty($pp_type_id)) ? $pp_type_id : 0,
                            'schedule_mw'=>$row['SCHED_MW'],
                            'lmp'=>$row['LMP'],
                            'loss_factor'=>$row['LOSS_FACTOR'],
                            'lmp_smp'=>$row['LMP_SMP'],
                            'lmp_loss'=>$row['LMP_LOSS'],
                            'congestion'=>$row['LMP_CONGESTION'],
                            'identifier'=>$identifier,
                            'upload_by'=>$request->user_id,
                            'created_at'=>date('Y-m-d h:i:s'),
                            'updated_at'=>date('Y-m-d h:i:s')
                        ];
                    } 
                    if(($count>0 && $res_type=='G') || $res_type != 'G'){
                        $data_final[]=[
                            'run_time'=>date('Y-m-d H:i',strtotime($row['RUN_TIME'])),
                            'run_hour'=>$run_hour[$keys],
                            'mkt_type'=>$row['MKT_TYPE'],
                            'time_interval'=>date('Y-m-d H:i',strtotime($row['TIME_INTERVAL'])),
                            'region_name'=>$row['REGION_NAME'],
                            'grid_id'=>(!empty($grid_id)) ? $grid_id : 0,
                            'resource_name'=>$res_name,
                            'resource_id'=>  (!empty($resource_id_temp)) ? $resource_id_temp : 0,
                            'resource_type'=>$row['RESOURCE_TYPE'],
                            'resource_type_id'=> (!empty($resource_type_id_temp)) ? $resource_type_id_temp : 0,
                            'pp_type_id'=> (!empty($pp_type_id)) ? $pp_type_id : 0,
                            'schedule_mw'=>$row['SCHED_MW'],
                            'lmp'=>$row['LMP'],
                            'loss_factor'=>$row['LOSS_FACTOR'],
                            'lmp_smp'=>$row['LMP_SMP'],
                            'lmp_loss'=>$row['LMP_LOSS'],
                            'congestion'=>$row['LMP_CONGESTION'],
                            'identifier'=>$identifier,
                            'upload_by'=>$request->user_id,
                            'created_at'=>date('Y-m-d h:i:s'),
                            'updated_at'=>date('Y-m-d h:i:s')
                        ];
                    }
                   
                    //$insert_data[] = $data;
                }
            }
        }
        // $insert_data = collect($insert_data);
        // $chunks = $insert_data->chunk(2000);
        if(!empty($data_temp)){
            $chunks_temp=array_chunk($data_temp,2000);
            foreach ($chunks_temp as $chunk_temp){
                UploadScheduleTemp::insert($chunk_temp);
            }
        }

        if(!empty($data_final)){
            $chunks_final=array_chunk($data_final,2000);
            foreach ($chunks_final as $chunk_final){
                UploadSchedule::insert($chunk_final);
            }
        }

        $identifier_url = UploadSchedule::where('upload_by',Auth::id())->latest('id')->first();
        echo $identifier_url->identifier;
               
      

       
    }

    public function delete_temp(Request $request){
        UploadScheduleTemp::where('identifier', $request->identifier)->delete();
        echo 'success';
    }    

    public function insertpowerplant(Request $request){
        $operator = $request->operator;
        $powerplant_id=Powerplant::insertGetId([
           'facility_name'=>$operator,
           'status'=>'Active'
        ]);
        echo $powerplant_id;
    }

    public function saveall(Request $request){
        //$identifier=generateRandomString();
        // $data=UploadScheduleTemp::where('upload_by',Auth::id())->chunk(500, function($saveall) use($request,&$save) {
            $x=0;
        //     $data_insert=[];
            $id=[];
            $saveall=UploadScheduleTemp::where('upload_by',Auth::id())->get();
            foreach($saveall AS $sa){
                $resource_type_count=ResourceType::where('resource_code',$sa->resource_type)->count();
                $resource_count=PowerplantResource::where('resource_id',$sa->resource_name)->count();
                if($resource_type_count==0){
                    $id=ResourceType::create([
                        'resource_code'=>$sa->resource_type,
                        'resource_name'=>''
                    ]);
                }

                if(!empty($request->main_resource[$x])){
                    $isExist = PowerplantResource::where('resource_id',$request->main_resource[$x])->doesntExist();
                    if($isExist){
                        if(!empty($request->powerplant[$x])){
                            PowerplantResource::create([
                                'powerplant_id'=>$request->powerplant[$x],
                                'resource_id'=>$request->main_resource[$x],
                            ]);
                        }
                    }
                }
                // if(!empty($request->resource_name[$x])){
                //     $resource_update=PowerplantResource::where('id',$request->resource_name[$x])->value('resource_id');
                //     $schedload = UploadScheduleTemp::find($request->id[$x]);
                //     $schedload->update(
                //         [
                //             'resource_id' => (!empty($request->resource_name[$x])) ? $request->resource_name[$x] : 0,
                //             'resource_name' => $resource_update
                //         ]
                //     );
                //     $newSched = $schedload->fresh();
                //     $resource_name=$newSched->resource_name; 
                //     $resource_id=PowerplantResource::where('resource_id',$resource_name)->value('id');
                // }
                
                // $resource_id=0;
                // if(!empty($request->resource_name[$x])){
                //     $resource_id=$request->resource_name[$x];
                //     $resource_name=PowerplantResource::where('id',$resource_id)->value('resource_id');
                // }else{
                    // $resource_id=PowerplantResource::where('resource_id',$sa->resource_name)->value('id');
                    // $resource_name=$sa->resource_name;
                //}
                $resource_type_id=ResourceType::where('resource_code',$sa->resource_type)->value('id');
                $data_insert[] =[
                    'run_time'=>$sa->run_time,
                    'run_hour'=>$sa->run_hour,
                    'mkt_type'=>$sa->mkt_type,
                    'time_interval'=>$sa->time_interval,
                    'region_name'=>$sa->region_name,
                    'grid_id'=> $sa->grid_id,
                    'resource_name'=>$sa->resource_name,
                    'resource_id'=> $sa->resource_id,
                    //'resource_id'=> ($resource_id!=0) ? $resource_id : 0,
                    'resource_type'=>$sa->resource_type,
                    'resource_type_id'=> $resource_type_id,
                    'pp_type_id'=> $sa->pp_type_id,
                    'schedule_mw'=>$sa->schedule_mw,
                    'lmp'=>$sa->lmp,
                    'loss_factor'=>$sa->loss_factor,
                    'lmp_smp'=>$sa->lmp_smp,
                    'lmp_loss'=>$sa->lmp_loss,
                    'congestion'=>$sa->congestion,
                    'upload_by'=>$sa->upload_by,
                    'identifier'=>$sa->identifier,
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                ];
                $x++;
            }   
            $chunky=array_chunk($data_insert,2000);
            foreach ($chunky as $chunkys){
                $save=UploadSchedule::insert($chunkys);
            }
            //$save=UploadSchedule::insert($data_insert);
        //});
        if($save){
            $sched = UploadSchedule::select('identifier')->where('upload_by',Auth::id())->get();
            $identifier_url = UploadSchedule::where('upload_by',Auth::id())->latest('id')->first();
            //$identifier_url = UploadSchedule::select('identifier')->where('upload_by',Auth::id())->latest('identifier')->value('identifier');
            UploadScheduleTemp::whereIn('identifier', $sched->pluck('identifier'))->delete();
            return redirect()->route('uploadschedules.show',$identifier_url->identifier);
        }
    }

    public function cancelschedule(){
        $sched = UploadScheduleTemp::where('upload_by',Auth::id())->get();
        UploadScheduleTemp::whereIn('identifier', $sched->pluck('identifier'))->delete();
    }

    /**
     * Display the specified resource.
     */
    public function show($identifier)
    {
        $scheduleload=UploadSchedule::where('identifier',$identifier)->paginate(10);
        return view('upload_schedule.show',compact('scheduleload'));
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
    public function update(Request $request)
    {
        for($x=0;$x<$request->counter;$x++){
            if(!empty($request->resource_name[$x])){
                $resource_id=$request->resource_name[$x];
                $resource_name=PowerplantResource::where('id',$resource_id)->value('resource_id');
            }else{
                $resource_id=0;
                $resource_name=$request->main_resource[$x];
            }
            $schedload = UploadScheduleTemp::find($request->id[$x]);
            $schedload->update(
                [
                    'resource_id' => $resource_id,
                    'resource_name' => $resource_name
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UploadSchedule $uploadSchedule)
    {
        //
    }
}
