<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seen extends Model
{
    protected $fillable = ['user_id', 'user_seen'];

    protected $casts = ['user_seen' => 'array'];
}
