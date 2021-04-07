<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'unique_id',
        'create_user_id',
        'created_at',
        'updated_at',
    ];
}
