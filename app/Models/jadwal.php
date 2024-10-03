<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';


    public $timestamps = false;


    protected $fillable = [
        'nama_kegiatan',
        'ketua_tpk',
        'sekertaris_tpk',
        'anggota_tpk',
        'waktu_pelaksanaan',
        'tanggal_mulai',
        'tanggal_selesai',
        'jumlah_biaya',
        'nama_kasi',
        'jabatan_kasi',
        'lokasi_kegiatan',
        'kegiatanId',
        'userId',
    ];
}
