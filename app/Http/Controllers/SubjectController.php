<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Subject;
use App\Exam;

class SubjectController extends Controller
{

    /**
     * Returns exams for a particular
     * subjects.
     *
     * @param Request $request
     * @return array
     */
    public function getExams(Request $request,$id)
    {
        try{
            $subject = Subject::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return $this->sendFailedResponse('Invalid subject ID.');
        }

        $examsList = $subject->mapExams()->pluck('exam_id');
        
        // Return all associated subject details
        return response()->json([
            'success' => 1,
            'exams' => Exam::find($examsList),
        ]);
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