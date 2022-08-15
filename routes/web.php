<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserGroupController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('users',[UsersController::class,'index']);
Route::get('groups',[UserGroupController::class,'index']);
Route::get('groups/create',[UserGroupController::class,'create']);
Route::post('groups',[UserGroupController::class,'store']);
Route::delete('groups/{id}',[UserGroupController::class,'destroy']);
