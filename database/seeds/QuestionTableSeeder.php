<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    protected $_TABLE = 'questions';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();
        DB::table($this->_TABLE)->insert($this->generateQuestions(1,4));
        DB::table($this->_TABLE)->insert($this->generateQuestions(2,2));
        DB::table($this->_TABLE)->insert($this->generateQuestions(3,2));
    }

    /**
     * Generates the question numbers
     *
     * @param int $mainQuestion
     * @param int $totalSubQuestions
     * @return void
     */
    protected function generateQuestions(int $mainQuestion,int $totalSubQuestions)
    {
        $arr = [];
        $char = ord('a');
        while($totalSubQuestions>0){
            array_push($arr,['num'=> "Q{$mainQuestion}.".chr($char)]);
            $totalSubQuestions--;
            $char++;
        }
        return $arr;
    }
}
