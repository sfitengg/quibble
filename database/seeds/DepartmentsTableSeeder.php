<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DepartmentsTableSeeder extends Seeder
{
    protected $_TABLE = 'departments';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();

        
        $faker = Faker::create();
        DB::table($this->_TABLE)->insert([
            ['name' => 'IT'],
            ['name' => 'CMPN'],
            ['name' => 'EXTC']
        ]);
    }
}
