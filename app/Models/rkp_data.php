<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rkp_data extends Model
{
    use HasFactory;

    protected $table = 'rkp_data';


    public $timestamps = true;

    protected $fillable = [
            'field',
            'sub_field',
            'activity_name',
            'activity_location',
            'volume',
            'benefit_target',
            'start_date',
            'end_date',
            'implementation_time',
            'total_cost',
            'funding_source',
            'self_management',
            'village_cooperation',
            'third_party',
            'officials_id',
            'user_id',
    ];

    public function officials_data()
    {
        return $this->belongsTo(officials_data::class, 'officials_id');
    }      
}
