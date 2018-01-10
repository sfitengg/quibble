<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    public $timestamps = false;

    protected $guarded = ['id'];


    public function mapExams()
    {
        return $this->hasMany('App\MapSubjectExam');
    }
}
