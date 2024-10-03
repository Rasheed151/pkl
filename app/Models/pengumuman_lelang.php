<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengumuman_lelang extends Model
{
    use HasFactory;

    protected $table = 'pengumuman_lelang';


    public $timestamps = false;


    protected $fillable = [
        'nama_kegiatan',
        'ketua_tpk',
        'sekertaris_tpk',
        'anggota_tpk',
        'lokasi_kegiatan',
        'bidang',
        'total_nilai_hps',
        'waktu_pelaksanaan',
        'waktu_pengumuman',
        'waktu_pendaftaran',
        'waktu_pemasukan',
        'waktu_evaluasi',
        'waktu_negosiasi',
        'waktu_penepatan',
        'kegiatanId',
        'userId',
    ];
}
