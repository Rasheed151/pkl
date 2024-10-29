<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class price_analysis extends Model
{
    use HasFactory;

    protected $table = 'price_analysis';


    public $timestamps = true;

    protected $fillable = [
            'technical_id',
            'code',
            'unit',
            'coefficient',
            'unit_price',
            'total_price',
            'user_id',
            'rkp_id',      
    ];

    public function technical_specifications()
    {
        return $this->belongsTo(technical_specifications::class, 'technical_id');
    }
}
