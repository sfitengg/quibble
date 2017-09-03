<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->string('year',4);
            $table->string('department_id');
            $table->string('class',1);
            $table->string('profile_pic')->default('/img/profile_default.png');

            $table->primary('id');
            $table->foreign('department_id')->references('id')->on('departments')
                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
