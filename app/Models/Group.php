<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $fillable=['title'];

    public function users(){
        return $this->hasMany(User::class);
    }

 //greeting array for select option
    public static function ArrayForSelect(){

        $arr=[];
        $groups= Group::all();// as same Group::all();
        foreach($groups as $group){
            $arr[$group->id] = $group->title;
        }
        return $arr;
    }
}
