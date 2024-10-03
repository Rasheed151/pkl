<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_analisa extends Model
{
    use HasFactory;

    protected $table = 'analisa_harga';


    public $timestamps = false;

    protected $fillable = [
        'nama',
        'kode',
        'satuan',
        'koefisien',
        'harga_satuan',
        'jumlah_harga',
        'jenis',
        'kegiatanId',
        'userId',];
}
