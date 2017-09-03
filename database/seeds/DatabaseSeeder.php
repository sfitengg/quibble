<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') exit();

        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);

        $this->call(UserSubjectTableSeeder::class);
        $this->call(StudentSubjectTableSeeder::class);
        
        $this->call(EntrustRolePermissionSeeder::class);
    }
}
