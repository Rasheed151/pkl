<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_teknis extends Model
{
    use HasFactory;

    protected $table = 'spesifikasi_teknis';


    public $timestamps = false;

    protected $fillable = [
       'nama',
       'spesifikasi',
       'jenis',
       'kegiatanId',
       'userId',
    ];
}
