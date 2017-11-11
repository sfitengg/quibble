<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class SubjectsTableSeeder extends Seeder
{
    protected $_TABLE = 'subjects';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();
        
                
        $faker = Faker::create();
        $dept = \DB::table('departments')->where('name','=','IT')->first();

        DB::table($this->_TABLE)->insert([
            ['uid'=>'11','name'=>'CGVR','sem'=>'5','department_id'=>$dept->id],
            ['uid'=>'22','name'=>'ADMBS','sem'=>'5','department_id'=>$dept->id],
            ['uid'=>'33','name'=>'OS','sem'=>'5','department_id'=>$dept->id],
        ]);
    }
}
