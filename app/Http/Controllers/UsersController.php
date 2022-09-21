<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUserReqeust;
use App\Http\Requests\updateUserReqeust;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Group;
use App\Models\User;
use App\Models\SaleItem;


class usersController extends Controller
{   
    public function __construct(){
        parent::__construct();
        $this->data['main_manu']='Users';
        $this->data['sub_manu'] ='Users';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users']= User::all();
        return view('users/users',$this->data);
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        $this->data['groups']    = Group::ArrayForSelect();  
        $this->data['mode']      = 'create';   
        $this->data['headline']  = 'Create New User';   

        return view('users.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createUserReqeust $request)
    {
        $formData= $request->all();
        if(User::create($formData)){
            Session::flash('message', 'User Created Successfully!!!');
        };
        return redirect()->to('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['user']     = User::find($id);
        $this->data['tab_manu'] = 'User info';

        return view('users.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user']      = User::findOrFail($id);
        $this->data['groups']    = Group::ArrayForSelect(); 
        $this->data['mode']      = 'edit';
        $this->data['headline']  = 'Update Information';

        return view('users.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateUserReqeust $request, $id)
    {
        $data= $request->all();

        $user= User::find($id);
        $user->group_id = $data['group_id'];
        $user->name     = $data['name'];
        $user->email    = $data['email'];
        $user->phone    = $data['phone'];
        $user->address  = $data['address'];
        

        if($user->save()){
            Session::flash('message', 'User Updated Successfully!!!');
        };
        return redirect()->to('users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id)->delete() ){
            Session::flash('message', 'User Deleted Successfully!!!');
        };
        return redirect()->to('users');
    }
}
