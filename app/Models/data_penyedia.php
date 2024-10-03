<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_penyedia extends Model
{
    use HasFactory;

    protected $table = 'data_penyedia';


    public $timestamps = false;

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tempat_tanggal_lahir',
        'nik',
        'alamat',
        'nama_perusahaan',
        'alamat_perusahaan',
        'no_hp',
        'npwp',
        'nib',
        'userId',
    
    ];
        
}
