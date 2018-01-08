<?php

use Illuminate\Database\Seeder;

class MapExamQuestionsTableSeeder extends Seeder
{
    protected $_TABLE = 'map_exam_questions';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table($this->_TABLE)->truncate();

         $exam = DB::table('exams')->pluck('id');
         $question = DB::table('questions')->pluck('id');

         //Convert above objects to array
        $exam = collect($exam)->map(function($x){return $x;})->toArray();
        $question = collect($question)->map(function($x){return $x;})->toArray();

        $marks = [2,5];
        for($i=0;$i<20;$i++){
            try{
                DB::table($this->_TABLE)->insert([
                    'exam_id'       => $exam[array_rand($exam)],
                    'question_id'   => $question[array_rand($question)],
                    'marks'         => $marks[array_rand($marks)],
                ]);
            }catch(Exception $e){}
        }
    }
}
