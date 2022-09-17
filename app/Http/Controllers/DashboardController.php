<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\SaleItem;
use App\Models\PurchaseItem;
use App\Models\Payment;
use App\Models\Receipt;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $this->data['TotalUsers']      = User::count('id');
        $this->data['TotalProducts']   = Product::count('id');
        $this->data['TotalSales']      = SaleItem::sum('total');
        $this->data['TotalPurchases']  = PurchaseItem::sum('total');
        $this->data['TotalPayments']   = Payment::sum('amount');
        $this->data['TotalReceipt']    = Receipt::sum('amount');
        $this->data['TotalStocks']    = PurchaseItem::sum('quantity') - SaleItem::sum('quantity');

        return view('dashboard',$this->data);
    }
}
