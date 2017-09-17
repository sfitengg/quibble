<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams_marks',function(Blueprint $table){
            $table->increments('id');
            $table->integer('exam_id')->unsigned();
            $table->string('student_id');
            $table->longText('marks');

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('exam_id')->references('id')->on('exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams_marks');
    }
}
