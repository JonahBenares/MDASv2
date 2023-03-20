<?php

namespace App\Imports;

use App\Models\UploadSchedule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

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
            return new UploadSchedule(array_merge([
                'run_time'=>$row['run_time'],
                'mkt_type'=>$row['mkt_type'],
                'time_interval'=>$row['time_interval'],
                'region_name'=>$row['region_name'],
                'resource_name'=>$row['resource_name'],
                'resource_type'=>$row['resource_type'],
                'schedule_mw'=>$row['sched_mw'],
                'lmp'=>$row['lmp'],
                'loss_factor'=>$row['loss_factor'],
                'lmp_smp'=>$row['lmp_smp'],
                'lmp_loss'=>$row['lmp_loss'],
                'congestion'=>$row['lmp_congestion'],
            ],$this->data));
        }
    }
}
