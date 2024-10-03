<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class narasumber extends Model
{
    use HasFactory;

    protected $table = 'narasumber';


    public $timestamps = false;

    protected $fillable = [
        'bamusrenbangdesId',
        'narasumber',
        'dari',
    ];

    public function bamusrenbangdes()
    {
        return $this->belongsTo(Bamusrenbangdes::class, 'bamusrenbangdesId');
    }
}
