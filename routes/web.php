<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\loginController;


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
    Route::get('dashboard', function () {
        //return Auth::user();
        return view('welcome');
    });
    Route::get('logout',[loginController::class,'logout'])->name('logout');  
    
    Route::get('groups',[UserGroupController::class,'index']);
    Route::get('groups/create',[UserGroupController::class,'create']);
    Route::post('groups',[UserGroupController::class,'store']);
    Route::delete('groups/{id}',[UserGroupController::class,'destroy']);
    
    
    //Route::resource('users',StudentController::class);
    Route::resource('users',UsersController::class);
    Route::resource('category',CategoryController::class,['except'=>['show']]);
    Route::resource('products',ProductController::class);

});



//Route::resource('photos', PhotoController::class);

// Route::get('users/{id}',[UsersController::class,'show']);
// Route::get('users/create',[UsersController::class,'create']);
// Route::post('users',[UsersController::class,'store']);
// Route::get('users',[UsersController::class,'edit']);
// Route::put('users/{id}',[UsersController::class,'update']);
// Route::delete('users',[UsersController::class,'delete']);
