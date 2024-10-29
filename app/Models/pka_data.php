<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pka_data extends Model
{
    use HasFactory;

    protected $table = 'pka_data';


    public $timestamps = true;

    protected $fillable = [
        'officials_id',
        'village_head_decree_number',
        'village_head_decree_date',
        'user_id',
    ];

    public function officials_data()
    {
        return $this->belongsTo(officials_data::class, 'officials_id');
    }      
}
