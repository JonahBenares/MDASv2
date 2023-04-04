<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PowerPlant extends Model
{
    use HasFactory;
    protected $table = 'powerplants';
    protected $primaryKey = 'id';
    protected $fillable = [
        'facility_name',
        'pp_type_id',
        'subtype_id',
        'operator',
        'short_name',
        'region_id',
        'region',
        'municipality',
        'grid_id',
        'capacity_installed',
        'capacity_dependable',
        'number_of_units',
        'ippa',
        'fit_approved',
        'owner_type',
        'type_of_contract',
        'connection_type',
        'status'
    ];
}
