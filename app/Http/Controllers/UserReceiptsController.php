<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\User;
use App\Models\Receipt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserReceiptsController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['main_manu'] = 'Users';
        $this->data['sub_manu'] = 'Users';
        $this->data['tab_manu'] = 'Receipts';
    }
    public function index($id){

        $this->data['user']  = User::findOrFail($id);
          

         return view('users.receipts.receipts',$this->data);
    }

    public function store (ReceiptRequest $request, $user_id, $invoice_id = null){

        $formData= $request->all();
        $formData['user_id']= $user_id;
        $formData['admin_id']= Auth::id();
        
        if($invoice_id){
            $formData['sale_invoice_id']= $invoice_id;
        }

        if(Receipt::create($formData)){
            Session::flash('message', 'Receipt Insert Successfully!!!');
        };

        if($invoice_id){

            return redirect()->route('user.sales.invoice_details', ['id' =>$user_id, 'invoice_id' => $invoice_id]);
        } else{

            return redirect()->route('users.show',['user' => $user_id]);
            
        }

    }


    public function destroy($user_id, $receipt_id){
        if(Receipt::destroy($receipt_id)){
            Session::flash('message', 'Receipt Deleted Successfully!!!');
        };

        return redirect()->route('user.receipts',['id' => $user_id]);
    }
}
