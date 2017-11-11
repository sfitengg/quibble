<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueColumnConstraintToExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exams',function(Blueprint $table){
            $table->unique(['subject_id','name'],'subject_exam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('exams',function(Blueprint $table){
            $table->dropUnique('subject_exam');
        });
        Schema::enableForeignKeyConstraints();
    }
}
