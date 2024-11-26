<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class swakelola_schedule extends Model
{
    use HasFactory;
    protected $table = 'swakelola_schedules';


    public $timestamps = true;

    protected $fillable = [
            'progress',
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
        return $this->belongsTo(announcement::class, 'rkp_id','rkp_id');
    }
}
