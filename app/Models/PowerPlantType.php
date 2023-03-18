<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PowerPlantType extends Model
{
    use HasFactory;
    protected $table = 'pp_type';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type_name',
        'legend'
    ];
}
