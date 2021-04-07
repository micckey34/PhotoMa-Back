<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupJoin extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'user_id',
        'group_id',
        'created_at',
        'updated_at',
    ];
}
