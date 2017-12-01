<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapExamQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_exam_questions',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('exam_id');
            $table->unsignedInteger('question_id')->comment('Question id');
            $table->float('marks',2,1);

            $table->foreign('exam_id')->references('id')->on('exams')
            ->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')
            ->onDelete('restrict');
            
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
        Schema::dropIfExists('map_exam_questions');
        Schema::enableForeignKeyConstraints();
    }
}
