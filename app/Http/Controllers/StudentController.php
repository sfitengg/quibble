<?php

namespace App\Http\Controllers;

use App\Student;
use App\Traits\ValidationTrait;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\ExcelFile\StudentListImport;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class StudentController extends Controller
{
    /**
     * Returns all the student from the table
     * in pages of 15 along with next
     * request url.
     *
     * @param Request $request
     * @return void
     */
    use ValidationTrait;

    public function getAll(Request $request)
    {
        $student = Student::paginate(15);

        JWTAuth::parseToken();
        $student->appends(['token'=>JWTAuth::getToken()->get()])->links();
        
        $student = $student->toArray();
        $student['student'] = $student['data'];
        unset($student['data']);
        return $student;
    }

    /**
     * Returns the details of student
     * who has the given pid.
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function getById(Request $request,$id)
    {
        return ['student'=>Student::where('id',$id)->first()];
    }
    
    /**
     * Inserts a new single student record
     * in the database
     *
     * @param Request $request
     * @return void
     */
    public function postSingle(Request $request)
    {
        try{
            $student = new Student;
            
            $student->uid = $request->uid;
            $student->name = $request->name;
            $student->class_id = $request->class_id;
            $student->roll_no = $request->roll_no;
            if($request->has('profile_pic')){
                $student->profile_pic = config("custom.storage.profile").$request->profile_pic;
            }

            $student->save();

            return ["student"=>Student::where('uid',$student->uid)->first()];
        }catch(QueryException $e){
            if($e->errorInfo[1] == 1062){
                return response()->json(['error'=>"Student uid {$request->uid} already exists."]);
            }

            return response()->json(['error'=>'Something went wrong..']);
        }
    }

    /**
     * Performs mass upload of students for
     * a specific class room via Excel
     * sheets.
     *
     * @param Request $request
     * @return void
     */
    public function postMultiple(Request $request,StudentListImport $studentList)
    {
        //Validation
        $rules = [
            'file'              => 'required',
            //Students class data
            'class_id'        => 'required|numeric',
            //Excel file data
            'start_row'         => 'required|numeric',  //Starting (head)row in excel sheet
            'column_uid'        => 'required|string',   //Represents column no. in excel
            'column_roll_no'    => 'required|string',   //Represents column no. in excel
            'column_name'       => 'required|string',   //Represents column no. in excel
            'sheet_name'        => 'required',
        ];
        /*try{
            $this->validateInput($request->only(array_keys($rules)),$rules);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }*/
        $studentList->setCustomSettings($request);
        $data = $studentList->handleImport();

        //Remove empty rows and convert it to array
        $data = array_filter($data->toArray(),function($val){
            return isset($val['pid_no.']);
        });

        // return response()->json(['file'=>$data]);
        $rejectedStudents = [];
        //Insert each new record to database and update existing one
        foreach($data as $student){
            if(!isset($student['pid_no.'])) break;

            try{
                Student::updateOrCreate(
                    ['uid'=>$student['pid_no.']],
                    [
                        'roll_no'   => $student['roll_no.'],
                        'name'      => str_replace([' /M',' /F'],'',$student['name']),
                        'gender'    => strpos($student['name'],'/M') === false?'F':'M',
                        'class_id'  => $request->class_id,
                    ]
                );
            }catch(QueryException $e){
                if($e->errorInfo[1] == 1062){
                    array_push($rejectedStudents,$student['pid_no.']);
                }
            }
            // $stnd->name = str_replace([' /M',' /F'],'',$student['name']);
            // $stnd->gender = strpos($student['name'],'/M') === false?'F':'M';
            // $stnd->class_id = $request->class_id;
            // $stnd->roll_no = $student['roll_no.'];
            // $stnd->save();
        }
        $response = [];
        if(count($rejectedStudents)>0){
            $response = [
                'success'=>0,
                'message'=>"Students with PID [".implode(',',$rejectedStudents)."] were not ". 
                        "added to a class as their roll no. was used by other PID."
            ];
        }else{
            $response = ['success'=>1,'message'=>"Added ".count($data)." students to a class."];
        }
        return response()->json($response);
    }

    /**
     * Deletes the student record with given
     * id.
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function delete(Request $request,$id)
    {
        $student = Student::find($id);
        if($student !==null){
            $student->delete();
            return ['message'=>'Student deleted successfully'];
        }

        return ['error'=>'Invalid id'];
    }

    public function patch(Request $request)
    {

    }

}
