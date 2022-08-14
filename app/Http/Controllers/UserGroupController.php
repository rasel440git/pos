<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class UserGroupController extends Controller
{
    public function index(){

        $this->data['groups'] = Group::all();
        return view('groups.groups',$this->data);

    }
}
