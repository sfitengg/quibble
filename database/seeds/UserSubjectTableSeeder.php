<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;

class UserSubjectTableSeeder extends Seeder
{
    protected $_TABLE = 'user_subject';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();
        
                
        $subjects = DB::table('subjects')->pluck('id');
        $users = DB::table('users')->pluck('id');

        //Convert above objects to array
        $subjects = collect($subjects)->map(function($x){return $x;})->toArray();
        $users = collect($users)->map(function($x){return $x;})->toArray();
        for($i=0;$i<20;$i++){
            try{
                DB::table($this->_TABLE)->insert([
                    'user_id' => $users[array_rand($users)],
                    'subject_id' => $subjects[array_rand($subjects)],
                ]);
            }catch(QueryException $e){
                //
            }
        }
    }
}
