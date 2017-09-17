<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueColumnConstraintToClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class',function(Blueprint $table){
            $table->unique(['year','department_id','division'],'year_dept_div');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class',function(Blueprint $table){
            $table->dropUnique('year_dept_div');
        });
    }
}
