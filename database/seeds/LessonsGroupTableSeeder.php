<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\LessonsGroup;
use App\User;

class LessonsGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons_group = new LessonsGroup();
        $lessons_group->user_id = 1;
        $lessons_group->author = User::whereId(1)->first()->username;
        $lessons_group->lesson_category_id = 1;
        $lessons_group->title = 'Present and past';
        $lessons_group->description = 'How to understand and make own sentences in the present and past tenses';
        $lessons_group->text = File::get(base_path('database/seeds/big_content/LessonsGroup/1-text.txt'));
        $lessons_group->save();
        $lessons_group = LessonsGroup::whereTitle('Present and past')->first();
        $lessons_group->image = $lessons_group->id . '-thumbnail.jpg';
        $lessons_group->update();
    }
}
