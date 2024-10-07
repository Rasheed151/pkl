<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_rkp extends Model
{
    use HasFactory;

    protected $table = 'data_rkp';


    public $timestamps = false;

    protected $fillable = [
        'bidang',
        'sub_bidang',
        'nama_kegiatan',
        'lokasi_kegiatan',
        'volume',
        'sasaran_manfaat',
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu_pelaksanaan',
        'jumlah_biaya',
        'sumber_biaya',
        'swakelola',
        'kerjasama_desa',
        'pihak_ketiga',
        'rencana_pelaksana_kegiatan',
        'userId',
    ];
}
