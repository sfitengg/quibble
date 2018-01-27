<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGenderToStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students',function(Blueprint $table){
            $table->char('gender',1)->after('name');
        });
        DB::statement('ALTER TABLE students ADD CONSTRAINT chk_gender CHECK(gender in ("M","F","O"));');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::statement('ALTER TABLE students DROP INDEX chk_gender;');
        Schema::table('students',function(Blueprint $table){
            if (DB::connection()->getDoctrineSchemaBuilder()->hasIndex('users_remember_token_index'))
                $table->dropIndex('chk_gender');
            
            $table->dropColumn('gender');
        });
    }
}
