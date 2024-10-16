<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengumuman extends Model
{
   
    use HasFactory;

    protected $table = 'data_pengumuman';


    public $timestamps = false;

    protected $fillable = [
        'kegiatanId',
        'cara_pengadaan',
        'tpkId',
        'tanggal',
        'userId',
    ];
    public function data_rkp()
    {
        return $this->belongsTo(data_rkp::class, 'kegiatanId');
    }

    public function data_tpk()
    {
        return $this->belongsTo(data_tpk::class, 'tpkId');
    }
}
