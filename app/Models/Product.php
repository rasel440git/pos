<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['category_id','title','desc','cost_price','price'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //greeting array for select option
    public static function ArrayForSelect(){

        $arr=[];
        $products= Product::all();// as same Group::all();
        foreach($products as $product){
            $arr[$product->id] = $product->title;
        }
        return $arr;
    }

}
