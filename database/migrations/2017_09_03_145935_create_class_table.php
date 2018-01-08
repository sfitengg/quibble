<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year',4);
            $table->integer('department_id')->unsigned();
            $table->string('division');

            $table->foreign('department_id')->references('id')->on('departments')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['year','department_id','division']);
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
        Schema::dropIfExists('class');
        Schema::enableForeignKeyConstraints();
    }
}
