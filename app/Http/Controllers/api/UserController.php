<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    function index(){
       $users = User::all();
        return UserResource::collection($users);
    }
}
