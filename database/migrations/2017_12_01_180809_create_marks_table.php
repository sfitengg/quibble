<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('subject_exam_id');
            $table->unsignedInteger('question_id');
            $table->float('marks',2,1);

            $table->foreign('student_id')->references('id')
            ->on('students')->onDelete('cascade');
            $table->foreign('subject_exam_id')->references('id')
            ->on('map_subject_exam')->onDelete('cascade');
            $table->foreign('question_id')->references('id')
            ->on('questions')->onDelete('cascade');
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
        Schema::dropIfExists('marks');
        Schema::enableForeignKeyConstraints();
    }
}
