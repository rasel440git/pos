<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserPaymentsController extends Controller
{
    public function __construct(){

        $this->data['tab_manu'] = 'Payments';
    }
    public function index($id){

        $this->data['user']  = User::findOrFail($id);
          

         return view('users.payments.payments',$this->data);
    }
}
