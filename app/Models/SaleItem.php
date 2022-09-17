<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model

{
    protected $fillable=['product_id','price','quantity','total','sale_invoice_id'];

    public function invoice(){
        return $this->belongsTo(SaleInvoice::class,'sale_invoice_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
