<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auction_announcements extends Model
{
    use HasFactory;

    protected $table = 'auction_announcements';


    public $timestamps = true;


    protected $fillable = [
        'announcement_time',
        'registration_time',
        'submission_time',
        'evaluation_time',
        'negotiation_time',
        'decision_time',
        'user_id',
        'rkp_id',
    ];

    public function rkp_data()
    {
        return $this->belongsTo(rkp_data::class, 'rkp_id', 'id');
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
