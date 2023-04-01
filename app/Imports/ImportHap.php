<?php

namespace App\Imports;

use App\Models\UploadHAP;
use App\Models\PriceNodes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
class ImportHap implements ToModel,WithHeadingRow
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
    public function headingRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        if($row['run_time']!=''){
            $nodes_count=PriceNodes::where('description',$row['price_node'])->count();
            if($nodes_count==0){
                PriceNodes::create([
                    'description'=>$row['price_node']
                ]);
            }
            $price_node=PriceNodes::where('description',$row['price_node'])->value('id');
            return new UploadHAP(array_merge([
                'run_time'=>date('Y-m-d h:i',strtotime($row['run_time'])),
                'interval_end'=>date('Y-m-d h:i',strtotime($row['interval_end'])),
                'price_node'=>$row['price_node'],
                'price_node_id'=> $price_node,
                'mw'=>$row['mw'],
                'lmp'=> $row['lmp'],
                'loss_factor'=>$row['loss_factor'],
                'energy'=> $row['energy'],
                'loss'=>$row['loss'],
                'congestion'=>$row['congestion']
            ],$this->data));
        }
    }
}
