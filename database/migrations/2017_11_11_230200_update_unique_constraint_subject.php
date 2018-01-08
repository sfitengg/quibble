<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUniqueConstraintSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects',function(Blueprint $table){
            //$table->dropUnique('subject_name_unique');
            $table->unique('uid','subject_uid_unique');
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
        Schema::table('subjects',function(Blueprint $table){
            $table->dropUnique('subject_uid_unique');
        });
        Schema::enableForeignKeyConstraints();
    }
}
