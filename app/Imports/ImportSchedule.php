<?php
namespace App\Imports;

use App\Models\UploadScheduleTemp;
use App\Models\Grid;
use App\Models\Region;
use App\Models\PowerplantResource;
use App\Models\Powerplant;
use App\Models\PowerplantType;
use App\Models\ResourceType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;
ini_set('max_execution_time', 180);
class ImportSchedule implements ToModel,WithHeadingRow, WithChunkReading
{
    use Importable;
    private $data; 

    public function __construct(array $data = [])
    {
        $this->data = $data; 
        $this->resource_type_id=ResourceType::all(['id','resource_code'])->pluck('id','resource_code');
        $this->grid_id=Grid::all(['id','grid_code'])->pluck('id','grid_code');
        $this->resource_id=PowerplantResource::all(['id','resource_id'])->pluck('id','resource_id');
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        if($row['run_time']!='EOF'){
            // $resource_type_id=ResourceType::where('resource_code',$row['resource_type'])->value('id');
            // $resource_type_count=ResourceType::where('resource_code',$row['resource_type'])->count();
            //$resource_id=PowerplantResource::where('resource_id',$row['resource_name'])->value('id');
            // $resource_count=PowerplantResource::where('resource_id',$row['resource_name'])->count();
            // $grid_id=Grid::where('grid_code',$row['region_name'])->value('id');
            // $grid_count=Grid::where('grid_code',$row['region_name'])->count();

            $powerplant_id= PowerplantResource::where("resource_id",$row['resource_name'])->value('powerplant_id');
            $pp_type_id= Powerplant::where("id",$powerplant_id)->value('pp_type_id');
            $id= PowerplantType::where("id",$pp_type_id)->value('id');
            return new UploadScheduleTemp(array_merge([
                'run_time'=>date('Y-m-d H:i',strtotime($row['run_time'])),
                'mkt_type'=>$row['mkt_type'],
                'time_interval'=>date('Y-m-d H:i',strtotime($row['time_interval'])),
                'region_name'=>$row['region_name'],
                'grid_id'=>$this->grid_id[$row['region_name']],
                'resource_name'=>$row['resource_name'],
                'resource_id'=>  (!empty($this->resource_id[$row['resource_name']])) ? $this->resource_id[$row['resource_name']] : 0,
                'resource_type'=>$row['resource_type'],
                'resource_type_id'=> $this->resource_type_id[$row['resource_type']],
                'pp_type_id'=> (!empty($id)) ? $id : 0,
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

    // public function batchSize(): int
    // {
    //     return 1000;
    // }
    
    public function chunkSize(): int
    {
        return 6000;
    }
}
