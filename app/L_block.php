<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class L_block extends Model
{
    use SoftDeletes;
    
    protected $dates = [
        'created_at', 'deleted_at', 'updated_at',
    ];
    protected $fillable = [
        'name', 'text', 'lesson_id',
    ];
}
