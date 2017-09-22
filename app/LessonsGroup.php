<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\lesson_category;

class LessonsGroup extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title', 'description', 'text', 'user_id', 'image', 'lesson_category_id', 'author',
    ];
    
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    
    public function getCategoryAttribute()
    {
        return lesson_category::whereId($this->lesson_category_id)->first()->name;
    }
    public function getShortContentAttribute()
    {
        return substr($this->text, 0, random_int(500,550));
    }
}
