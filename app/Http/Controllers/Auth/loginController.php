<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Admin;


class loginController extends Controller
{
    public function login(){
        $this->data['headline']="Login";
        $this->data['title']=" Welcome to Mini Point of Sales System";
        return view('login.form',$this->data);
    }

    public function authenticate(LoginRequest $request){
         $data= $request->only('email','password');

         if(Auth::attempt($data) ){
            return redirect()->intended('dashboard');
         }
         else{
            return redirect()->route('login')->withErrors(['Invalid Username & Password']);
         }
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('login');
    }
}
