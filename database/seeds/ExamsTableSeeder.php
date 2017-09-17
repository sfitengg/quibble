<?php

use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{
    protected $_TABLE = 'exams';
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();
        
        $subject = DB::table('subjects')->pluck('id');
        //Convert $subject into array
        $subject = collect($subject)->map(function($x){return $x;})->toArray();
        
        $exam = ['IAT1','IAT2'];
        for($i=0;$i<200;$i++){
            try{
                DB::table($this->_TABLE)->insert([
                    'name'      => $exam[array_rand($exam)],
                    'subject_id'=> $subject[array_rand($subject)],
                    'pattern_id'   => 1,
                ]);
            }catch(Exception $e){
                
            }
            
        }
    }
}