<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<10;$i++){
            DB::table('users')->insert([
                'name'      => $faker->name,
                'email'     => $faker->email,
                'password'  => bcrypt('secret')
            ]);
        }
        DB::table('users')->insert([
            'name'      => 'Het Shah',
            'email'     => 'htshah60@gmail.com',
            'password'  => bcrypt('helloworld')
        ]);
    }
}
