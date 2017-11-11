<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    protected $_TABLE = 'students';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();
        
                
        $faker = Faker::create();

        $class = DB::table('class')->pluck('id');
        //Convert $class into array
        $class = collect($class)->map(function($x){return $x;})->toArray();
        
        for($i=16100;$i<=16300;$i++){
            DB::table($this->_TABLE)->insert([
                'uid'       => $i,
                'name'      => $faker->name,
                'class_id'=> $class[array_rand($class)],
            ]);
        }
    }
}
