<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;

class StudentSubjectTableSeeder extends Seeder
{
    protected $_TABLE = 'student_subject';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();
        
                
        $subjects = DB::table('subjects')->pluck('id');
        $students = DB::table('students')->pluck('id');

        //Convert above objects to array
        $subjects = collect($subjects)->map(function($x){return $x;})->toArray();
        $students = collect($students)->map(function($x){return $x;})->toArray();

        
        for($i=0;$i<200;$i++){
            try{
                DB::table($this->_TABLE)->insert([
                    'student_id' => $students[array_rand($students)],
                    'subject_id' => $subjects[array_rand($subjects)],
                ]);
            }catch(QueryException $e){

            }
        }
    }
}
