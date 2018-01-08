<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapSubjectExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_subject_exam',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('exam_id');

            $table->foreign('subject_id')->references('id')
            ->on('subjects');
            $table->foreign('exam_id')->references('id')
            ->on('exams')->onDelete('restrict');

            $table->unique(['subject_id','exam_id']);
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
        Schema::dropIfExists('map_subject_exam');
        Schema::enableForeignKeyConstraints();
    }
}
