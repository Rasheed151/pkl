<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_perkiraan extends Model
{
    use HasFactory;

    protected $table = 'perkiraan_harga';


    public $timestamps = false;

    protected $fillable = [
        'nama',
        'spesifikasi',
        'volume',
        'satuan',
        'harga_satuan',
        'jumlah_harga',
        
        'kegiatanId',
        'userId',
    ];
}
