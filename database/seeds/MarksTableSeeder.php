<?php

use Illuminate\Database\Seeder;

class MarksTableSeeder extends Seeder
{
    protected $_TABLE = 'marks';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();

        $student = DB::table('students')->pluck('id');
        $subjectExam = DB::table('map_subject_exam')->pluck('id');
        $question = DB::table('questions')->pluck('id');

         //Convert above objects to array
        $student = collect($student)->map(function($x){return $x;})->toArray();
        $subjectExam = collect($subjectExam)->map(function($x){return $x;})->toArray();
        $question = collect($question)->map(function($x){return $x;})->toArray();

        $marks = [2,5];
        for($i=0;$i<20;$i++){
            try{
                DB::table($this->_TABLE)->insert([
                    'student_id'            => $student[array_rand($student)],
                    'subject_exam_id'       => $subjectExam[array_rand($subjectExam)],
                    'question_id'           => $question[array_rand($question)],
                    'marks'                 => rand(1,2),
                ]);
            }catch(Exception $e){}
        }
    }
}
