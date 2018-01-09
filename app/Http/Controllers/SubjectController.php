<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Department;
use App\ClassRoom;
use App\MapDepartmentSubject;
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
		try{
			// Retrieve department ID
			$department = Department::where('name','=',$request->department)->firstOrFail();
		}catch(ModelNotFoundException $e){
			return $this->sendFailedResponse("Given department was not found.");
		}
		/* try{
			// Retrieve classroom ID
			$class = ClassRoom::where(['year'=>$request->year,
				'department_id'=>$department->id,
				'division'=>$request->division])->firstOrFail();
		}catch(ModelNotFoundException $e){
			return $this->sendFailedResponse("Given classroom was not found.");
		} */
		// Retrieve all associated subject ID
    	//$subjectList = MapDepartmentSubject::where('department_id','=',$department->id)->pluck('subject_id');
		// Return all associated subject details
		return response()->json(['success'=>1,'subjects'=>Subject::where(['sem'=>$request->semester,'department_id'=>$department->id])->get()]);
	}
	
	/**
	 * Returns a failed reponse with an
	 * error message
	 *
	 * @param string $error
	 * @return void
	 */
	public function sendFailedResponse(string $error)
	{
		return response()->json(['error'=>$error]);
	}
}