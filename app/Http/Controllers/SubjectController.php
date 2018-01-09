<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\ClassRoom;
use App\MapClassSubject;
use App\Subject;

class SubjectController extends Controller
{
	/**
	 * Returns all the subjects associated with a particular
	 * classroom.
	 *
	 * @param Request $request
	 * @return void
	 */
	public function getClassSubjects(Request $request)
    {
		// Retrieve department ID
    	$department = Department::where('name','=',$request->department)->first();

		// Retrieve classroom ID
    	$class = ClassRoom::where(['year'=>$request->year,
    		'department_id'=>$department->id,
    		'division'=>$request->division])->first();

		// Retrieve all associated subject ID
    	$subjectList = MapClassSubject::where('class_id','=',$class->id)->pluck('subject_id');
		// Return all associated subject details
		return response()->json(['success'=>1,'subjects'=>Subject::find($subjectList)]);
    }
}
