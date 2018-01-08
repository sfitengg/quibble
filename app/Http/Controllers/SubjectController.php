<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\ClassRoom;
use App\Subject;

class SubjectController extends Controller
{
    public function getClassSubjects(Request $request)
    {
    	$department = Department::where('name','=',$request->department)->first();

    	$class = ClassRoom::where(['year'=>$request->year,
    		'department_id'=>$department->id,
    		'division'=>$request->division])->first();

    	$subjects = Subject::where('class_id','=',$class->id);
    	return response()->json(['success'=>1,'subjects'=>$subjects]);
    }
}
