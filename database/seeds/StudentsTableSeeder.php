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

        $dept = DB::table('departments')->pluck('id');
        //Convert $dept into array
        $dept = collect($dept)->map(function($x){return $x;})->toArray();
        
        for($i=0;$i<200;$i++){
            DB::table($this->_TABLE)->insert([
                'id'        => $faker->uuid,
                'name'      => $faker->name,
                'department_id'=> $dept[array_rand($dept)],
            ]);
        }
    }
}
