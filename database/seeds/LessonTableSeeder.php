<?php

use Illuminate\Database\Seeder;
use App\Lesson;
use App\LessonsGroup;
use App\User;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lesson = new Lesson();
        $lesson->user_id = 1;
        $lesson->author = User::whereId(1)->first()->username;
        $lesson->lesson_group_id = 1;
        $lesson->title = 'Present continuous';
        $lesson->description = 'This is a lesson where we`ll learn how to say "I`m doing something" in English.';
        $lesson->save();
        
        $lesson = new Lesson();
        $lesson->user_id = 1;
        $lesson->author = User::whereId(1)->first()->username;
        $lesson->lesson_group_id = 1;
        $lesson->title = 'Present simple';
        $lesson->description = 'This is a lesson about how to say in English some simple sentences.';
        $lesson->save();
    }
}
