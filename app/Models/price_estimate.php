<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class price_estimate extends Model
{
    use HasFactory;

    protected $table = 'price_estimate';


    public $timestamps = true;

    protected $fillable = [
            'name',
            'specification',
            'volume',
            'unit',
            'unit_price',
            'total_price',
            'user_id',
            'rkp_id',
    ];

            
}
