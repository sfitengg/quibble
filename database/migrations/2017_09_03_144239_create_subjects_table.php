<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->string('name');
            $table->string('sem',2);
            $table->integer('co')->comment('Total no. of Course outcome');
            $table->integer('department_id')->unsigned();
            
            $table->foreign('department_id')->references('id')->on('departments');

            $table->unique(['name','department_id']);
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
        Schema::dropIfExists('subjects');
        Schema::enableForeignKeyConstraints();
    }
}
