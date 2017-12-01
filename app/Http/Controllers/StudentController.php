<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class StudentController extends Controller
{
    public function getAll(Request $request){
        $student = Student::paginate(15);

        JWTAuth::parseToken();
        $student->appends(['token'=>JWTAuth::getToken()->get()])->links();
        
        $student = $student->toArray();
        $student['student'] = $student['data'];
        unset($student['data']);
        return $student;
    }

    public function getById(Request $request,$id){
        return ['student'=>Student::where('id',$id)->first()];
    }
    
    public function post(Request $request){
        try{
            $student = new Student;
            
            $student->uid = $request->uid;
            $student->name = $request->name;
            $student->class_id = $request->class_id;
            $student->profile_pic = config("custom.storage.profile").$request->profile_pic;

            $student->save();

            return ["student"=>$student];
        }catch(Illuminate\Database\QueryException $e){
            
            if($e->getCode() == 1602)
                return ['error'=>"Student uid {$request->uid} already exists."];
        }
        
    }

    public function delete(Request $request,$id){
        $student = Student::find($id);
        if($student !==null){
            $student->delete();
            return ['message'=>'Student deleted successfully'];
        }

        return ['error'=>'Invalid id'];
    }

    public function patch(Request $request){

    }
}
