<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnqiueDepartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('departments',function(Blueprint $table){
             //$table->dropUnique('subject_name_unique');
             $table->unique('name','subject_name_unique');
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
         Schema::table('departments',function(Blueprint $table){
             $table->dropUnique('subject_name_unique');
         });
         Schema::enableForeignKeyConstraints();
     }
}
