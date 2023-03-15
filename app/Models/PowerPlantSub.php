<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PowerPlantSub extends Model
{
    use HasFactory;
    protected $table = 'pp_subtype';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type_id',
        'subtype_name'
    ];
}
