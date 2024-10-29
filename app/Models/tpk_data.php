<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tpk_data extends Model
{
    use HasFactory;

    protected $table = 'tpk_data';


    public $timestamps = true;

    protected $fillable = [
        'tpk_group_name',
        'head_name',
        'head_gender',
        'head_birthplace_date',
        'head_nik',
        'head_address',
        'head_phone_number',
        'secretary_name',
        'secretary_gender',
        'secretary_birthplace_date',
        'secretary_nik',
        'secretary_address',
        'secretary_phone_number',
        'member_name',
        'member_gender',
        'member_birthplace_date',
        'member_nik',
        'member_address',
        'member_phone_number',
        'village_decree_number',
        'village_decree_date',
        'user_id',
    ];
}
