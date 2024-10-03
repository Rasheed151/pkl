<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bamusrenbangdes extends Model
{
   
    use HasFactory;

    protected $table = 'bamusrenbangdes';


    public $timestamps = false;

    protected $fillable = [
        'tanggal',
        'jam',
        'tempat',
        'bahas_kegiatan',
        'materi_pembahasan',
        'ketua_bpd',
        'wakil_masyarakat',
        'pimpinan_rapat',
        'notulen',
        'kesepakatan_akhir',
        'userId',
    ];

    public function narasumbers()
    {
        return $this->hasMany(Narasumber::class, 'bamusrenbangdesId');
    }
}


