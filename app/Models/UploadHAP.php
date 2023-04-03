<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadHAP extends Model
{
    use HasFactory;
    protected $table = 'hap';
    protected $primaryKey = 'id';
    protected $fillable = [
        'run_time',
        'interval_end',
        'price_node',
        'price_node_id',
        'mw',
        'lmp',
        'loss_factor',
        'energy',
        'loss',
        'congestion',
        'identifier',
        'upload_by'
    ];
}
