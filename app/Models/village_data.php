<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class village_data extends Model
{
    use HasFactory;

    protected $table = 'village_data';


    public $timestamps = true;

    protected $fillable = [
        'province',
        'district',
        'subdistrict',
        'village',
        'village_code',
        'office_address',
        'email',
        'npwp',
        'pbj_decree_number',
        'pbj_decree_date',
        'dpa_approval_number',
        'dpa_approval_date',
        'village_head_name',
        'fiscal_year',
        'user_id',
    ];
    
}
