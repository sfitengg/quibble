<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;
use App\Department;
use App\ClassRoom;

class DepartmentController extends Controller
{
    public function __construct(){
        $this->middleware('jwt.auth');
    }

    public function getAll(){
        return ['department'=>Department::all()];
    }

    public function getById(Request $request,$id){
        $dept = ['department'=>Department::where('id',$id)->first()];
        return $dept;
    }

    public function getClass(Request $request,$id){
        try{
            return ['class'=>Department::findOrFail($id)->classRoom()->get()];
        }catch(ModelNotFoundException $e){
            return $this->sendFailedResponse('Invalid department id.');
        }
    }

    /**
     * Returns all the subjects associated with a particular
     * classroom.
     *
     * @param Request $request
     * @return void
     */
    public function getSubjects(Request $request,$id,$sem=null)
    {
        try{
            // Retrieve department ID
            $department = Department::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return $this->sendFailedResponse("Given department was not found.");
        }
        
        $subjects = $department->subjects();

        if($sem != null){
            $subjects = $subjects->where('sem',$sem);
        }
        // Return all associated subject details
        return response()->json([
            'success' => 1,
            'subjects' => $subjects->get(),
        ]);
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
            $department->delete();
            return ['message'=>'Department deleted successfully'];
        }

        return ['error'=>'Invalid id'];
    }

    public function patch(Request $request){

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
