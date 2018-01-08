<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    // protected $table = 'subjects';
    protected $table = 'map_class_subject';

    public $timestamps = false;

    protected $guarded = ['id'];
}
