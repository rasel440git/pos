<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class UsersController extends Controller
{
    public function index(){

        return view('users.users');

    }
    
    
}
