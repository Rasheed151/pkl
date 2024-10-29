<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kak_data extends Model
{
    use HasFactory;

    protected $table = 'kak_data';


    public $timestamps = true;

    protected $fillable = [
        'background',
        'rkp_id',
        'user_id',
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
