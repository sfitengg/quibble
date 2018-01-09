<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameMapClassSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('map_class_subject','map_department_subject');
        Schema::table('map_department_subject',function(Blueprint $table){
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['class_id']);
            $table->renameColumn('class_id','department_id');
            $table->foreign('department_id')
            ->references('id')->on('departments')
            ->onUpdate('cascade')->onDelete('cascade');
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('map_department_subject','map_class_subject');
        Schema::table('map_department_subject',function(Blueprint $table){
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['department_id']);
            $table->renameColumn('department_id','class_id');
            $table->foreign('class_id')
            ->references('id')->on('class')
            ->onUpdate('cascade')->onDelete('cascade');
            Schema::enableForeignKeyConstraints();
        });
    }
}
