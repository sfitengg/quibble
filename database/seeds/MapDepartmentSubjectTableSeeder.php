<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;

class MapDepartmentSubjectTableSeeder extends Seeder
{
    protected $_TABLE = 'map_department_subject';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();
        
                
        $department = DB::table('departments')->pluck('id');
        $subject = DB::table('subjects')->pluck('id');

        //Convert above objects to array
        $department = collect($department)->map(function($x){return $x;})->toArray();
        $subject = collect($subject)->map(function($x){return $x;})->toArray();
        for($i=0;$i<20;$i++){
            try{
                DB::table($this->_TABLE)->insert([
                    'subject_id' => $subject[array_rand($subject)],
                    'department_id' => $department[array_rand($department)],
                ]);
            }catch(Exception $e){}
        }
    }
}
