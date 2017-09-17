<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLengthOfDescriptionInLessonsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons_groups', function(Blueprint $table) {
            $table->string('description', 255)->change();
        });
        
        Schema::table('lessons', function(Blueprint $table) {
            $table->string('description', 255)->change();
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
            $table->string('description')->change();
        });
        
        Schema::table('lessons', function(Blueprint $table) {
            $table->string('description')->change();
        });
    }
}
