<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = 'region';
    protected $primaryKey = 'id';
    protected $fillable = [
        'grid_id',
        'region_code',
        'region_name'
    ];
}
