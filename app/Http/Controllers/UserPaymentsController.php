<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
        /*
            *Add New Payment
            *@param PaymentRequest   $request
            *@param int              $user_id
        */
    public function store (PaymentRequest $request, $user_id, $invoice_id = null){

        $formData             = $request->all();
        $formData['user_id']  = $user_id;
        $formData['admin_id'] = Auth::id();

        if($invoice_id){
            $formData['purchase_invoice_id']= $invoice_id;
        }

        if(Payment::create($formData)){
            Session::flash('message', 'Payment Insert Successfully!!!');
        };

        if($invoice_id){

            return redirect()->route('user.purchases.invoice_details', ['id' =>$user_id, 'invoice_id' => $invoice_id]);
        } else{

            return redirect()->route('users.show',['user' => $user_id]);
            
        }
        
    }


    public function destroy($user_id, $payment_id){
        if(Payment::destroy($payment_id)){
            Session::flash('message', 'Payment Deleted Successfully!!!');
        };

        return redirect()->route('user.payments',['id' => $user_id]);
    }
}
