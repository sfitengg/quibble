<?php

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    protected $_TABLE = 'class';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();
        
                
        $year = ['FE','SE','TE','BE'];
        $division = ['A','B'];

        $dept = DB::table('departments')->pluck('id');
        //Convert $dept into array
        $dept = collect($dept)->map(function($x){return $x;})->toArray();
        for($i=0;$i<20;$i++){
            try{
                DB::table($this->_TABLE)->insert([
                    'year' => $year[array_rand($year)],
                    'department_id' => $dept[array_rand($dept)],
                    'division' => $division[array_rand($division)],
                ]);
            }catch(Exception $e){}
        }
    }
}
