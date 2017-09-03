<?php

namespace App\Http\Controllers\Auth;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;

class AccessController extends Controller{


    protected function rules($rule){
        switch($rule){
            case 'roleName':
                return 'required|string|min:3';
            case 'permission':
                return 'required|string|min:3';
            case 'userEmail':
                return 'required|string';
            case 'displayName':
                return 'required|string|min:3';
            case 'description':
                return 'required|string|min:3';
            default:
                return '';
        }
    }

    /*
    *   Functions to get field names that will be
    *   sent as request
    */
    protected function roleField(){
        return 'roleName';
    }
    protected function displayNameField(){
        return 'displayName';
    }
    protected function descriptionField(){
        return 'description';
    }
    protected function permissionField(){
        return 'permissionName';
    }
    protected function userField(){
        return 'userEmail';
    }

    public function createRole(Request $request){
        $this->validate($request,[
            $this->roleField()  => $this->rules($this->roleField()),
            $this->displayNameField() => $this->rules($this->displayNameField()),
            $this->descriptionField() => $this->rules($this->descriptionField()),
        ]);
        

        $role = new Role();
        $role->name = $request->input($this->roleField());
        $role->display_name = $request->input($this->displayNameField());
        $role->description = $request->input($this->descriptionField());
        $role->save();
        
        return response()->json(['success'=>true,'message'=>"New role created successfully."]);
        
    }
    
    public function createPermission(Request $request){
        $this->validate($request,[
            $this->permissionField()  => $this->rules($this->permissionField()),
            $this->displayNameField() => $this->rules($this->displayNameField()),
            $this->descriptionField() => $this->rules($this->descriptionField()),
        ]);

        $permissionField = $request->input($this->permissionField());
        $viewUsers = new Permission();
        $viewUsers->name = $permissionField;
        $viewUsers->display_name = $request->input($this->displayNameField());
        $viewUsers->description = $request->input($this->descriptionField());
        $viewUsers->save();
        
        return response()->json(['success'=>true,'message'=>"New permission created successfully."]);
        
    }
    
    public function assignRole(Request $request){
        $this->validate($request,[
            $this->userField()=> $this->rules($this->userField()),
            $this->roleField()=> $this->rules($this->roleField()),
        ]);

        $user = User::where('email', '=', $request->input($this->userField()))->first();
        
        $role = Role::where('name', '=', $request->input($this->roleField()))->first();
        //$user->attachRole($request->input('role'));
        $user->roles()->attach($role->id);
        
        return response()->json(['success'=>true,'message'=>"Role successfully assigned to user."]);
    }
    
    public function attachPermission(Request $request){
        $this->validate($request,[
            $this->roleField()=> $this->rules($this->roleField()),
            $this->permissionField()=> $this->rules($this->permissionField()),
        ]);

        $role = Role::where('name', '=', $request->input($this->roleField()))->first();
        $permission = Permission::where('name', '=', $request->input($this->permissionField()))->first();
        $role->attachPermission($permission);
        
        return response()->json(['success'=>true,'message'=>"Permission attached to role."]);
    }
}
