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
        'nama_kegiatan',
        'jumlah_biaya',
        'cara_pengadaan',
        'volume',
        'satuan',
        'nama_tpk',
        'lokasi_kegiatan',
        'tanggal',
        'waktu_pelaksanaan',
        'kegiatanId',
        'userId',
    ];
}
