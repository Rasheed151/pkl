<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class officials_data extends Model
{
    use HasFactory;

    protected $table = 'officials_data';


    public $timestamps = true;

    protected $fillable = [
        'name',
        'gender',
        'birthplace_date',
        'nik',
        'address',
        'npwp',
        'phone_number',
        'position',
        'user_id',
    ];
}
