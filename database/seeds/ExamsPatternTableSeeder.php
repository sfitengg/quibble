<?php

use Illuminate\Database\Seeder;

class ExamsPatternTableSeeder extends Seeder
{
    protected $_TABLE = 'exams_pattern';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_TABLE)->truncate();
        $pattern = [
            'pattern'=>[
                '1'=>[  //Main question
                    '1'=>['out_of'=>2],
                    '2'=>['out_of'=>2],
                    '3'=>['out_of'=>2],
                    '4'=>['out_of'=>2],
                    '5'=>['out_of'=>2],
                    '6'=>['out_of'=>2],
                ],
                '2'=>[  //Main question
                    '1'=>['out_of'=>5],
                    '2'=>['out_of'=>5],
                ],
                '3'=>[  //Main question
                    '1'=>['out_of'=>5],
                    '2'=>['out_of'=>5],
                ],
            ],
        ];
        DB::table($this->_TABLE)->insert([
            'id'        => 1,
            'name'      => 'IAT',
            'pattern'   => json_encode($pattern),
        ]);
    }
}
