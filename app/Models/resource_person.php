<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resource_person extends Model
{
    use HasFactory;

    protected $table = 'resource_person';


    public $timestamps = true;

    protected $fillable = [
        'bamusrenbangdes_id',
        'resource_person',
        'from',
    ];

    public function bamusrenbangdes()
    {
        return $this->belongsTo(Bamusrenbangdes::class, 'bamusrenbangdes_id');
    }

}
