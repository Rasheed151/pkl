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
       'nama_kegiatan',
       'latar_belakang',
       'sasaran_manfaat',
       'cara_pengadaan',
       'ketua_tpk',
       'sekertaris_tpk',
       'anggota_tpk',
       'nama_kasi',
       'jabatan_kasi',
       'waktu_pelaksanaan',
       'tanggal_mulai',
       'tanggal_selesai',
       'kegiatanId',
       'jumlah_biaya',
       'userId',
    ];
}
