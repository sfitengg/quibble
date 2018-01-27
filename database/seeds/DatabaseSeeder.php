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
        Schema::disableForeignKeyConstraints();

        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(ClassTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        
        $this->call(ExamsTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        
        $this->call(MapExamQuestionsTableSeeder::class);
        $this->call(MapSubjectExamTableSeeder::class);
        
        $this->call(MarksTableSeeder::class);
        
        $this->call(EntrustRolePermissionSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
