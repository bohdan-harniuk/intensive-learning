<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FromStringToTextInLessonsAndLessonsGroupsTables extends Migration
{
    public function up()
    {
        Schema::table('lessons_groups', function(Blueprint $table) {
            $table->text('description')->change();
            $table->text('text')->change();
        });
        
        Schema::table('lessons', function(Blueprint $table) {
            $table->text('description')->change();
            $table->text('text')->change();
        });
    }

    public function down()
    {
        Schema::table('lessons_groups', function(Blueprint $table) {
            $table->string('description', 255)->change();
            $table->string('text', 100000)->change();
        });
        
        Schema::table('lessons', function(Blueprint $table) {
            $table->string('description', 255)->change();
            $table->string('text', 100000)->change();
        });
    }
}
