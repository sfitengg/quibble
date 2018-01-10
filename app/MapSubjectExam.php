<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapSubjectExam extends Model
{
    protected $table = 'map_subject_exam';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function exams()
    {
        return $this->belongsToMany('App\Exam');
    }
    
    public function subjects()
    {
        return $this->belongsToMany('App\Subjects');
    }
}
