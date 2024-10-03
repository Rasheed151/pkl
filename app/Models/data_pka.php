<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_pka extends Model
{
    use HasFactory;

    protected $table = 'data_pka';


    public $timestamps = false;

    protected $fillable = [
        'nama',
        'tempat_tanggal_lahir',
        'nik',
        'jabatan',
        'no_hp',
        'alamat',
        'no_sk_kades',
        'tanggal_sk_kades',
        'userId',];

}
