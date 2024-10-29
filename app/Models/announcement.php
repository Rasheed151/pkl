<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    use HasFactory;

    protected $table = 'announcement_data';


    public $timestamps = true;

    protected $fillable = [
        'procurement_method',
        'tpk_id',
        'start_date',
        'end_date',
        'rkp_id',
        'user_id',
    ];
    public function rkp_data()
    {
        return $this->belongsTo(rkp_data::class, 'rkp_id');
    }

    public function tpk_data()
    {
        return $this->belongsTo(tpk_data::class, 'tpk_id');
    }

}
