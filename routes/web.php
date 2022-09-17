<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Reports\SaleReportsController;
use App\Http\Controllers\Reports\PurchaseReportsController;
use App\Http\Controllers\Reports\PaymentsReportsController;
use App\Http\Controllers\Reports\ReceiptsReportsController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::get('login',[loginController::class,'login'])->name('login');
    Route::post('confirm',[loginController::class,'authenticate'])->name('login.confirm');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/',[DashboardController::class,'index']) ;
    Route::get('dashboard',[DashboardController::class,'index']) ;

    Route::get('logout',[loginController::class,'logout'])->name('logout');  
    
    Route::get('groups',[UserGroupController::class,'index']);
    Route::get('groups/create',[UserGroupController::class,'create']);
    Route::post('groups',[UserGroupController::class,'store']);
    Route::delete('groups/{id}',[UserGroupController::class,'destroy']);    
    
    
    Route::resource('users',UsersController::class);

    Route::get('users/{id}/sales',                               [UserSalesController::class,'index'])->name('user.sales');
    Route::post('users/{id}/invoices',                           [UserSalesController::class,'createInvoice'])->name('user.sales.store');
    Route::get('users/{id}/invoices{invoice_id}',                [UserSalesController::class,'invoice'])->name('user.sales.invoice_details');
    Route::delete('users/{id}/invoices{invoice_id}',             [UserSalesController::class,'destroy'])->name('user.sales.destroy');
    Route::post('users/{id}/invoices{invoice_id}',               [UserSalesController::class,'addItem'])->name('user.sales.invoices.add_item');
    Route::delete('users/{id}/invoices/{invoice_id}/{item_id}',  [UserSalesController::class,'destroy_item'])->name('user.sales.invoice.delete_item');

    //Route for Purchases
    Route::get('users/{id}/purchases',                            [UserPurchasesController::class,'index'])->name('user.purchases');
    Route::post('users/{id}/purchases',                           [UserPurchasesController::class,'createInvoice'])->name('user.purchases.store');
    Route::get('users/{id}/purchases{invoice_id}',                [UserPurchasesController::class,'invoice'])->name('user.purchases.invoice_details');
    Route::delete('users/{id}/purchases{invoice_id}',             [UserPurchasesController::class,'destroy'])->name('user.purchases.destroy');
    Route::post('users/{id}/purchases{invoice_id}',               [UserPurchasesController::class,'addItem'])->name('user.purchases.add_item');
    Route::delete('users/{id}/purchases/{invoice_id}/{item_id}',  [UserPurchasesController::class,'destroy_item'])->name('user.purchases.delete_item');


    Route::get('users/{id}/payments',                 [UserPaymentsController::class,'index'])->name('user.payments');
    Route::post('users/{id}/payments/{invoice_id?}',  [UserPaymentsController::class,'store'])->name('user.payments.store');
    Route::delete('users/{id}/payments/{payment_id}', [UserPaymentsController::class,'destroy'])->name('user.payments.destroy');
    
    Route::get('users/{id}/receipts',                 [UserReceiptsController::class,'index'])->name('user.receipts');
    Route::post('users/{id}/receipts/{invoice_id?}',  [UserReceiptsController::class,'store'])->name('user.receipts.store');
    Route::delete('users/{id}/receipts/{receipt_id}', [UserReceiptsController::class,'destroy'])->name('user.receipts.destroy');


    Route::resource('category',CategoryController::class,['except'=>['show']]);

    Route::resource('products',ProductController::class);
    Route::get('stocks', [ProductStockController::class,'index'])->name('stocks');

    Route::get('reports/sales', [SaleReportsController::class,'index'])->name('reports.sales');
    Route::get('reports/purchases', [PurchaseReportsController::class,'index'])->name('reports.purchases');

    Route::get('reports/payments', [PaymentsReportsController::class,'index'])->name('reports.payments');
    Route::get('reports/receipts', [ReceiptsReportsController::class,'index'])->name('reports.receipts');




});


