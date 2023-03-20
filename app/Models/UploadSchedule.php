<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadSchedule extends Model
{
    use HasFactory;
    protected $table = 'mpsl';
    protected $primaryKey = 'id';
    protected $fillable = [
        'run_time',
        'mkt_type',
        'run_hour',
        'time_interval',
        'region_name',
        'grid_id',
        'resource_name',
        'resource_id',
        'resource_type',
        'resource_type_id',
        'schedule_mw',
        'lmp',
        'loss_factor',
        'lmp_smp',
        'lmp_loss',
        'congestion',
        'upload_by'
    ];
}
