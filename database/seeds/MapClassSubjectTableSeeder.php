<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;

class MapClassSubjectTableSeeder extends Seeder
{
    protected $_TABLE = 'map_class_subject';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();
        
                
        $class = DB::table('class')->pluck('id');
        $subject = DB::table('subjects')->pluck('id');

        //Convert above objects to array
        $class = collect($class)->map(function($x){return $x;})->toArray();
        $subject = collect($subject)->map(function($x){return $x;})->toArray();
        for($i=0;$i<20;$i++){
            try{
                DB::table($this->_TABLE)->insert([
                    'subject_id' => $subject[array_rand($subject)],
                    'class_id' => $class[array_rand($class)],
                ]);
            }catch(Exception $e){}
        }
    }
}
