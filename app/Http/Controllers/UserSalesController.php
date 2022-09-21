<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceProductRequest;
use App\Models\User;
use App\Models\SaleInvoice;
use App\Models\Product;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserSalesController extends Controller
{
    
    public function __construct(){
        parent::__construct();
        $this->data['main_manu']= 'Users';
        $this->data['sub_manu'] = 'Users';
        $this->data['tab_manu'] = 'Sales';
    }
    public function index($id){

        $this->data['user']  = User::findOrFail($id);
          

         return view('users.sales.sales',$this->data);
    }

    public function createInvoice(InvoiceRequest $request, $user_id){

        $formData= $request->all();
        $formData['user_id']    = $user_id;
        $formData['admin_id']   = Auth::id();

        $invoice= SaleInvoice::create($formData);

        return redirect()->route('user.sales.invoice_details', ['id' =>$user_id, 'invoice_id' => $invoice->id]);
    }

    public function invoice($user_id, $invoice_id){

         $this->data['user']     = User::findOrFail($user_id);
         $this->data['invoice']  = SaleInvoice::findOrFail($invoice_id);
         $this->data['products'] = Product::ArrayForSelect();

         return view('users.sales.invoice', $this->data);
    }

    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id){

        $formData= $request->all();
        $formData['sale_invoice_id']= $invoice_id;
       

        if(SaleItem::create($formData)){
            Session::flash('message', 'Sale Item Created Successfully!!!');
        };

        return redirect()->route('user.sales.invoices.add_item', ['id' =>$user_id, 'invoice_id' =>$invoice_id]);
    }

    public function destroy_item($user_id, $invoice_id, $item_id){
        if(SaleItem::destroy($item_id)){
            Session::flash('message', 'Sale Item Deleted Successfully!!!');
        };

        return redirect()->route('user.sales.invoice_details', ['id' =>$user_id, 'invoice_id' =>$invoice_id]);

    }

    public function destroy($user_id, $invoice_id){
        if(SaleInvoice::destroy($invoice_id)){
            Session::flash('message', 'Invoice Deleted Successfully!!!');
        };
        
        return redirect()->route('user.sales', ['id' =>$user_id]);

    }
}
