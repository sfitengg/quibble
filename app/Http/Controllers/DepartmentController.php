<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\ClassRoom;

class DepartmentController extends Controller
{
    public function __construct(){

    }

    public function getAll(){
        return ['department'=>Department::all()];
    }

    public function getById(Request $request,$id){
        $dept = ['department'=>Department::where('id',$id)->first()];
        return $dept;
    }

    public function getClass(Request $request,$id){
        return ['class'=>ClassRoom::where('department_id',$id)->get()];
    }
    
    public function post(Request $request){
        try{
            $dept = new Department;
            
            $dept->name = $request->name;

            $dept->save();

            $dept = ['department'=>Department::where('name',$request->name)->first()];
            return $dept;
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
