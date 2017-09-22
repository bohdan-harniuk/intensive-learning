<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTextFieldInLessonsAndLessonsGroupsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('lessons_groups', function(Blueprint $table) {
            $table->string('text', 100000)->change();
        });
        
        Schema::table('lessons', function(Blueprint $table) {
            $table->string('text', 100000)->change();
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
            $table->string('text', 5000)->change();
        });
        
        Schema::table('lessons', function(Blueprint $table) {
            $table->string('text', 5000)->change();
        });
    }
}
