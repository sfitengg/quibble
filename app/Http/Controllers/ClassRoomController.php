<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassRoom;

class ClassRoomController extends Controller
{
    public function __construct(){
        
    }

    public function getAll(){
        return ['class'=>ClassRoom::all()];
    }

    public function getById(Request $request,$id){
        return ['class'=>ClassRoom::where('id',$id)->first()];
    }
    
    public function post(Request $request){
        try{
            $class = new ClassRoom;
            
            $class->year = $request->year;
            $class->department_id = $request->departmebt_id;
            $class->division = $request->division;

            $class->save();

            return ["class"=>$class->get()];
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
