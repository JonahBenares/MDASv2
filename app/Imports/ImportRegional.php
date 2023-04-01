<?php

namespace App\Imports;

use App\Models\UploadRegional;
use App\Models\Grid;
use App\Models\Commodity;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
ini_set('max_execution_time', 180);
class ImportRegional implements ToModel,WithHeadingRow
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
            $commodity_count=Commodity::where('commodity_code',$row['commodity_type'])->count();
            if($commodity_count==0){
                Commodity::create([
                    'commodity_code'=>$row['commodity_type']
                ]);
            }
            $commodity_id=Commodity::where('commodity_code',$row['commodity_type'])->value('id');
            $grid_id=Grid::where('grid_code',$row['region_name'])->value('id');
            return new UploadRegional(array_merge([
                'run_time'=>date('Y-m-d',strtotime($row['run_time'])),
                'mkt_type'=>$row['mkt_type'],
                'time_interval'=>date('Y-m-d h:i',strtotime($row['time_interval'])),
                'region_name'=>$row['region_name'],
                'grid_id'=> $grid_id,
                'commodity_type'=>$row['commodity_type'],
                'commodity_id'=> $commodity_id,
                'demand'=>$row['mkt_reqt'],
                'generation'=> $row['generation'],
                'losses'=>$row['losses'],
                'import'=>$row['mkt_import'],
                'export'=>$row['mkt_export'],
                'load_bid'=>$row['load_bid'],
                'load_curtailed'=>($row['load_curtailed']!='') ? $row['load_curtailed'] : 0
            ],$this->data));
           
        }
    }
}
