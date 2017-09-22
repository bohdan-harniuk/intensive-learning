<?php

use Illuminate\Database\Seeder;
use App\Lesson_category;

class LessonCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Lesson_category();
        $category->name = 'English tenses';
        $category->save();
        $category = new Lesson_category();
        $category->name = 'English verbs';
        $category->save();
        $category = new Lesson_category();
        $category->name = 'English nouns';
        $category->save();
    }
}
