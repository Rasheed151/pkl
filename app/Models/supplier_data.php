<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier_data extends Model
{
    use HasFactory;

    protected $table = 'supplier_data';


    public $timestamps = true;

    protected $fillable = [
        'name',
        'gender',
        'birthplace_date',
        'nik' ,
        'address',
        'company_name',    
        'company_address', 
        'phone_number',
        'npwp',
        'nib',
        'user_id'
    ];

}
