<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_desa extends Model
{
    use HasFactory;

    protected $table = 'data_desa';


    public $timestamps = false;

    protected $fillable = [
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
        'kode_desa',
        'alamat_kantor',
        'email',
        'npwp',
        'no_tahun_perpub_pjb',
        'tanggal_perpub_pjb',
        'no_pengesahan_dpa',
        'tanggal_pengesahan_dpa',
        'nama_kades',
        'tahun_anggaran',
        'userId',];
}
