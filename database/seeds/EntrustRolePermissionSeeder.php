<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class EntrustRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name'=>'admin','display_name'=>'Admin','description'=>'User can acts as admin'],
            ['name'=>'teacher','display_name'=>'Teacher','description'=>'User can acts as teacher'],
        ];
        $permissions = [
            ['name'=>'give-access-rights','display_name'=>'Give access rights','description'=>'Allows user to give access rights'],
        ];

        $attachPermission = [
            'admin'=>['give-access-rights'],
        ];

        $assignRole = [
            'admin' => ['htshah60@gmail.com'],
        ];
        
        foreach($roles as $role){
            $this->insertRole($role);
        }

        /*foreach($permissions as $permissions){
            $this->insertPermission($role);
        }

        foreach($attachPermission as $role=>$permission){
            $this->attachPermission($role,$permission);
        }*/

        foreach($assignRole as $role=>$user){
            $this->assignRole($role,$user);
        }
    }


    protected function insertRole($roleData){
        $role = new Role();
        $role->name = $roleData['name'];
        $role->display_name = $roleData['display_name'];
        $role->description = $roleData['description'];
        $role->save();
    }

    protected function insertPermission($permissionData){
        $viewUsers = new Permission();
        $viewUsers->name = $permissionData['name'];
        $viewUsers->display_name = $permissionData['display_name'];
        $viewUsers->description = $permissionData['description'];
        $viewUsers->save();
    }

    protected function assignRole($roleData,$userData){
        $user = User::where('email', '=', $userData)->first();
        
        $role = Role::where('name', '=', $roleData)->first();
        //$user->attachRole($request->input('role'));
        $user->roles()->attach($role->id);
    }
    
    protected function attachPermission($roleData,$permissionData){
        $role = Role::where('name', '=', $roleData)->first();
        $permission = Permission::where('name', '=', $permissionData)->first();

        $role->attachPermission($permission);
    }
}
