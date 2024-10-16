<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_kak extends Model
{
    use HasFactory;

    protected $table = 'data_kak';


    public $timestamps = false;

    protected $fillable = [
       'latar_belakang',
       'kegiatanId',
       'userId',
    ];

    public function data_rkp()
    {
        return $this->belongsTo(data_rkp::class, 'kegiatanId');
    }

    public function jadwal()
    {
        return $this->belongsTo(jadwal::class, 'kegiatanId');
    }
}
