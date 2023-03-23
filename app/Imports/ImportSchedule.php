<?php
namespace App\Imports;

use App\Models\UploadScheduleTemp;
use App\Models\Grid;
use App\Models\Region;
use App\Models\PowerplantResource;
use App\Models\ResourceType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
ini_set('max_execution_time', 180);
class ImportSchedule implements ToModel,WithHeadingRow
{
    private $data; 

    public function __construct(array $data = [])
    {
        $this->data = $data; 
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        if($row['run_time']!='EOF'){
            $resource_type_id=ResourceType::where('resource_code',$row['resource_type'])->value('id');
            $resource_type_count=ResourceType::where('resource_code',$row['resource_type'])->count();
            $resource_id=PowerplantResource::where('resource_id',$row['resource_name'])->value('id');
            $resource_count=PowerplantResource::where('resource_id',$row['resource_name'])->count();
            $grid_id=Grid::where('grid_code',$row['region_name'])->value('id');
            $grid_count=Grid::where('grid_code',$row['region_name'])->count();
            return new UploadScheduleTemp(array_merge([
                'run_time'=>date('Y-m-d',strtotime($row['run_time'])),
                'mkt_type'=>$row['mkt_type'],
                'time_interval'=>date('Y-m-d h:i',strtotime($row['time_interval'])),
                'region_name'=>$row['region_name'],
                'grid_id'=> (!empty($grid_id)) ? $grid_id : 0,
                'resource_name'=>$row['resource_name'],
                'resource_id'=> (!empty($resource_id)) ? $resource_id : 0,
                'resource_type'=>$row['resource_type'],
                'resource_type_id'=> (!empty($resource_type_id)) ? $resource_type_id : 0,
                'schedule_mw'=>$row['sched_mw'],
                'lmp'=>$row['lmp'],
                'loss_factor'=>$row['loss_factor'],
                'lmp_smp'=>$row['lmp_smp'],
                'lmp_loss'=>$row['lmp_loss'],
                'congestion'=>$row['lmp_congestion'],
            ],$this->data));
            // if($resource_type_count==0){
            //     ResourceType::create([
            //         'resource_code'=>$row['resource_type'],
            //         'resource_name'=>''
            //     ]);
            // }
        }
    }
}
