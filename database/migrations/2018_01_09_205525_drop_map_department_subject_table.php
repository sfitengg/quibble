<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropMapDepartmentSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('map_department_subject');
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('map_department_subject', function (Blueprint $table) {
            $table->integer('department_id')->unsigned();
            $table->integer('subject_id')->unsigned();

            $table->foreign('department_id')->references('id')->on('departments')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['department_id','subject_id']);
        });
        Schema::enableForeignKeyConstraints();
    }
}
