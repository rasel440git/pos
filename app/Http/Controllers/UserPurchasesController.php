<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceProductRequest;

use App\Models\User;
use App\Models\PurchaseInvoice;
use App\Models\Product;
use App\Models\SaleItem;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserPurchasesController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['main_manu'] = 'Users';
        $this->data['sub_manu'] = 'Users';
        $this->data['tab_manu'] = 'Purchases';
    }

    public function index($id){

        $this->data['user']  = User::findOrFail($id);
          

         return view('users.purchases.purchases',$this->data);
    }

    public function createInvoice(InvoiceRequest $request, $user_id){

        $formData             = $request->all();
        $formData['user_id']  = $user_id;
        $formData['admin_id'] = Auth::id();

        $invoice= PurchaseInvoice::create($formData);

        return redirect()->route('user.purchases.invoice_details', ['id' =>$user_id, 'invoice_id' => $invoice->id]);
    }

    public function invoice($user_id, $invoice_id){
    
         $this->data['user']     = User::findOrFail($user_id);
         $this->data['invoice']  = PurchaseInvoice::findOrFail($invoice_id);
         $this->data['totalPayable']  =  $this->data['invoice']->items()->sum('total');
         $this->data['totalPaid']  = $this->data['invoice']->payments()->sum('amount');
         $this->data['products'] = Product::ArrayForSelect();

         return view('users.purchases.invoice', $this->data);
    }

    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id){
        
        $formData                        = $request->all();
        $formData['purchase_invoice_id'] = $invoice_id;
       

        if(PurchaseItem::create($formData)){
            Session::flash('message', 'Purchase Item Created Successfully!!!');
        };

        return redirect()->route('user.purchases.invoice_details', ['id' =>$user_id, 'invoice_id' =>$invoice_id]);
    }

    public function destroy_item($user_id, $invoice_id, $item_id){
        if(PurchaseItem::destroy($item_id)){
            Session::flash('message', 'Purchases Item Deleted Successfully!!!');
        };
        return redirect()->route('user.purchases.invoice_details', ['id' =>$user_id, 'invoice_id' =>$invoice_id]);

    }

    public function destroy($user_id, $invoice_id){
        if(PurchaseInvoice::destroy($invoice_id)){
            Session::flash('message', 'Invoice Deleted Successfully!!!');
        };
        return redirect()->route('user.purchases', ['id' =>$user_id]);

    }
}
