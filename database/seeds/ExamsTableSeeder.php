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
        
        /*$subject = DB::table('subjects')->pluck('id');
        //Convert $subject into array
        $subject = collect($subject)->map(function($x){return $x;})->toArray();
        */
        $exams = ['IAT1','IAT2'];
        foreach($exams as $exam){
            try{
                DB::table($this->_TABLE)->insert([
                    'name'      => $exam,
                    'marks'     => 20,
                ]);
            }catch(Exception $e){}
            
        }
    }
}