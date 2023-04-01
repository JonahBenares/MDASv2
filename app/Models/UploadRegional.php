<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadRegional extends Model
{
    use HasFactory;
    protected $table = 'regional_summary';
    protected $primaryKey = 'id';
    protected $fillable = [
        'run_time',
        'mkt_type',
        'time_interval',
        'region_name',
        'grid_id',
        'commodity_type',
        'commodity_id',
        'demand',
        'generation',
        'losses',
        'import',
        'export',
        'load_bid',
        'load_curtailed',
        'upload_by'
    ];
}
