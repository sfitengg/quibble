<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $table = 'class';

    public $timestamps = false;

    protected $guarded = ['id'];
}
