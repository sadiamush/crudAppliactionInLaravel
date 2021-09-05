<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sessionController;
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
//Session Route
route::view("/sessionform","session");
route::post("/getformdata",[sessionController::class,"index"]);





//CRUD ROUTES
route::view("/Userform","form");
route::view("/editform","edit");
route::post("/showDataController",[App\Http\Controllers\crudController::class,"create"]);
route::get("/getData/Customer",[App\Http\Controllers\crudController::class,"index"]);
route::get("/edit/Customer/{customer}",[App\Http\Controllers\crudController::class,"getIDOfeditCustomer"]);
route::post("/update/Customer/{customer}",[App\Http\Controllers\crudController::class,"update"]);
route::get("/delete/Customer/{customer}",[App\Http\Controllers\crudController::class,"destroy"]);
Route::get('/', function () {
    return view('form');
});

