<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_tpk extends Model
{
    use HasFactory;

    protected $table = 'data_tpk';


    public $timestamps = false;

    protected $fillable = [
       'nama',
       'jenis_kelamin',
       'tempat_tanggal_lahir',
       'alamat',
       'nik',
       'no_hp',
       'no_sk_desa',
       'tanggal_sk_desa',
       'jabatan',
       'userId',
    
    ];



}
