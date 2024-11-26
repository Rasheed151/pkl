<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer_implementation extends Model
{
    use HasFactory;

    protected $table = 'offer_implementations';


    public $timestamps = true;

    protected $fillable = [

            'opening_time',
            'evaluation_time',
            'negotiation_time',
            'information',
            'user_id',
            'rkp_id',
    ];
    public function rkp_data()
    {
        return $this->belongsTo(rkp_data::class, 'rkp_id');
    }

    public function announcement()
    {
        return $this->belongsTo(announcement::class, 'rkp_id', 'rkp_id');
    }

    public function price_estimate()
    {
        return $this->belongsTo(price_estimate::class, 'rkp_id', 'rkp_id');
    }

}
