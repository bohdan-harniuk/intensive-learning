<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(LessonCategoryTableSeeder::class);
        $this->call(LessonsGroupTableSeeder::class);
        $this->call(LessonTableSeeder::class);
    }
}
