<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class technical_specifications extends Model
{
    use HasFactory;
    protected $table = 'technical_specifications';


    public $timestamps = true;

    protected $fillable = [
            'name',
            'specification',
            'type',
            'user_id',
            'rkp_id',
    ];

    public function rkp_data()
    {
        return $this->belongsTo(rkp_data::class, 'rkp_id');
    }

    public function price_analysis()
    {
        return $this->hasMany(price_analysis::class, 'technical_id');
    }
}
