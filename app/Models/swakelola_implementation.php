<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class swakelola_implementation extends Model
{
    use HasFactory;
    protected $table = 'swakelola_implementations';


    public $timestamps = true;

    protected $fillable = [
            'discussion',
            'follow_up',
            'user_id',
            'rkp_id',
    ];

    public function rkp_data()
    {
        return $this->belongsTo(rkp_data::class, 'rkp_id');
    }

    public function announcement()
    {
        return $this->belongsTo(announcement::class, 'rkp_id','rkp_id');
    }
}
