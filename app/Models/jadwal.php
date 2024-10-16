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
        'ketua_tpk',
        'sekertaris_tpk',
        'anggota_tpk',
        'nama_kasi',
        'kegiatanId',
        'userId',
    ];

    public function data_rkp()
    {
        return $this->belongsTo(data_rkp::class, 'kegiatanId');
    }

    public function ketuaTpk()
    {
        return $this->belongsTo(data_tpk::class, 'ketua_tpk');
    }

    public function sekertarisTpk()
    {
        return $this->belongsTo(data_tpk::class, 'sekertaris_tpk');
    }

    public function anggotaTpk()
    {
        return $this->belongsTo(data_tpk::class, 'anggota_tpk');
    }

    public function dataAparat()
    {
        return $this->belongsTo(data_aparat::class, 'nama_kasi');
    }

    public function pengumuman()
    {
        return $this->belongsTo(pengumuman::class, 'kegiatanId');
    }
}
