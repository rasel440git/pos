<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable=['title'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public static function ArrayForSelect(){
        $arr=[];
        $categories= Category::all();// as same Group::all();
        foreach($categories as $category){
            $arr[$category->id] = $category->title;
        }
        return $arr;
    }
}
