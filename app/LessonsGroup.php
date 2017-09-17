<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonsGroup extends Model
{
    protected $fillable = [
        'title', 'description', 'text', 'user_id',
    ];
}
