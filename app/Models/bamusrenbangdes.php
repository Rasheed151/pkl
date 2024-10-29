<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bamusrenbangdes extends Model
{

    use HasFactory;

    protected $table = 'bamusrenbangdes';


    public $timestamps = true;

    protected $fillable = [
        'date',
        'time',
        'place',
        'activity_discussion',
        'discussion_material',
        'bpd_leader',
        'community_representative',
        'meeting_leader',
        'note',
        'final_agreement',
        'user_id'
    ];

    public function resource_person()
    {
        return $this->hasMany(resource_person::class, 'bamusrenbangdes_id');
    }
}
