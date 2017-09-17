<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLengthOfDescriptionInLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons_groups', function(Blueprint $table) {
            $table->string('description')->change();
        });
        
        Schema::table('lessons', function(Blueprint $table) {
            $table->string('description')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lessons_groups', function(Blueprint $table) {
            $table->string('description', 35)->change();
        });
        
        Schema::table('lessons', function(Blueprint $table) {
            $table->string('description', 35)->change();
        });
    }
}
