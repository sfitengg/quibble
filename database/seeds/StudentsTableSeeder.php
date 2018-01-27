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
            $genderFull = ['male', 'female'];
            $genderType = array_rand($genderFull);
            $gender = strtoupper(substr($genderFull[$genderType],0,1));
            try{
                $student = [
                    'uid'       => $i,
                    'name'      => $faker->name($genderFull[$genderType]),
                    'roll_no'   => $faker->numberBetween(1,80),
                    'class_id'  => $class[array_rand($class)],
                    'gender'    => $gender,
                ];
                DB::table($this->_TABLE)->insert($student);
            }catch(Exception $e){}
        }
    }
}
