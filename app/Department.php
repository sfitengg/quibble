<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "departments";
    public $timestamps = false;

    protected $fillable = ['name'];

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

    public function classRoom()
    {
        return $this->hasMany('App\ClassRoom');
    }
}
