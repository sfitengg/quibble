<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClassRoom;
use App\Student;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ClassRoomController extends Controller
{
    public function __construct(){
        
    }

    public function getAll(){
        $classroom = ClassRoom::paginate(15)->toArray();
        $classroom['class'] = $classroom['data'];
        unset($classroom['data']);
        return $classroom;
    }

    public function getById(Request $request,$id){
        return ['class'=>ClassRoom::where('id',$id)->first()];
    }

    public function getStudents(Request $request,$id){
        $students = Student::where('class_id',$id)->paginate(15);
        $students->appends(['token'=>JWTAuth::getToken()->get()])->links();
        $students = $students->toArray();
        $students['student'] = $students['data'];
        unset($students['data']);
        return $students;
    }
    
    public function post(Request $request){
        try{
            $class = new ClassRoom;
            
            $class->year = $request->year;
            $class->department_id = $request->department_id;
            $class->division = $request->division;

            $class->save();

            return ["class"=>$class];
        }catch(Illuminate\Database\QueryException $e){
            
            if($e->getCode() == 1602)
                return ['error'=>"{$request->name} already exists."];
        }
        
    }

    public function delete(Request $request,$id){
        $department = Department::find($id);
        if($department !==null){
            Department::destroy($id);
            return ['message'=>'Department deleted successfully'];
        }

        return ['error'=>'Invalid id'];
    }

    public function patch(Request $request){

    }
}
