<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IHopeFinalChangeInLessonsGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons_groups', function(Blueprint $table) {
            $table->string('text', 5000)->change();
            $table->integer('lesson_category_id');
        });
        
        Schema::table('lessons', function(Blueprint $table) {
            $table->string('text', 5000)->change();
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
            $table->string('text', 2000)->change();
            $table->dropColumn(['lesson_category_id']);
        });
        
        Schema::table('lessons', function(Blueprint $table) {
            $table->string('text', 2000)->change();
        });
    }
}
