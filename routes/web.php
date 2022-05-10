<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index']);




Route::prefix('ts-admin')->group(function (){
    Route::get('/', function () {return view('admin.home'); });
    Route::resource('categories',CategoryController::class);
});

