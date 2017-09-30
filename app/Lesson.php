<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title', 'description', 'text', 'user_id','lesson_group_id', 'author',
    ];
    
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];
}
