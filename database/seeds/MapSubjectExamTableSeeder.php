<?php

use Illuminate\Database\Seeder;

class MapSubjectExamTableSeeder extends Seeder
{
    protected $_TABLE = 'map_subject_exam';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();

         $exam = DB::table('exams')->pluck('id');
         $subject = DB::table('subjects')->pluck('id');

         //Convert above objects to array
        $exam = collect($exam)->map(function($x){return $x;})->toArray();
        $subject = collect($subject)->map(function($x){return $x;})->toArray();

        $marks = [2,5];
        for($i=0;$i<20;$i++){
            try{
                DB::table($this->_TABLE)->insert([
                    'exam_id'       => $exam[array_rand($exam)],
                    'subject_id'    => $subject[array_rand($subject)],
                ]);
            }catch(Exception $e){}
        }
    }
}
