<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('jwt.auth');
    }
    public function getUsers(){
        return User::all();
    }
}
