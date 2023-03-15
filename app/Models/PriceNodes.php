<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceNodes extends Model
{
    use HasFactory;
    protected $table = 'price_node';
    protected $primaryKey = 'id';
    protected $fillable = [
        'description'
    ];
}
