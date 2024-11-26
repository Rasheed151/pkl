<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rptkbps extends Model
{
    use HasFactory;

    protected $table = 'rptkbps';


    public $timestamps = true;

    protected $fillable = [
            'technical_id',
            'code',
            'unit',
            'coefficient',
            'volume',
            'amount',
            'final_amount',
            'user_id',
            'rkp_id',
    ];

    public function technical_specifications()
    {
        return $this->belongsTo(technical_specifications::class, 'technical_id');
    }

    public function rkp_data()
    {
        return $this->belongsTo(rkp_data::class, 'rkp_id');
    }
}
