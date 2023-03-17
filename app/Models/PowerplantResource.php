<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PowerplantResource extends Model
{
    use HasFactory;
    protected $table = 'pp_resource';
    protected $primaryKey = 'id';
    protected $fillable = [
        'powerplant_id',
        'resource_id',
        'date_commissioned',
        'hex'
    ];
}
