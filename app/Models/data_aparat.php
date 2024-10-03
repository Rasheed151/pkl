<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_aparat extends Model
{
    use HasFactory;

    protected $table = 'data_aparat';


    public $timestamps = false;

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tempat_tanggal_lahir',
        'nik',
        'alamat',
        'npwp',
        'no_hp',
        'jabatan',
        'userId',];
}
