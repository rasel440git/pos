<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Group;

class UserGroupController extends Controller
{
    public function index(){

        $this->data['groups'] = Group::all();
        return view('groups.groups',$this->data);

    }

    public function create(){

        return view('groups.form');

    }

    public function store(Request $request){
        $formData= $request->all();
        if(Group::create($formData)){
            Session::flash('message', 'Group Created Successfully!!!');
        };
        return redirect()->to('groups');
    }

    public function destroy($id){
        if(Group::find($id)->delete() ){
            Session::flash('message', 'Group Deleted Successfully!!!');
        }
        return redirect()->to('groups');
    }
}
