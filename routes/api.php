<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*

|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post("login",[\App\Http\Controllers\API\UserController::class,"login"])
->name("login");
Route::post("register",[\App\Http\Controllers\API\UserController::class,"register"])
->name("register");

Route::group(['middleware' => 'auth:api'], function(){
    Route::post("UserProfile",[\App\Http\Controllers\API\UserController::class,"UserProfile"])
->name("UserProfile");

Route::post("ViewProduct",[\App\Http\Controllers\API\ProductController::class,"ViewProduct"])
->name("ViewProduct");

Route::post("categories",[\App\Http\Controllers\API\ProductController::class,"categories"])
->name("categories");

Route::post("searchBycategory",[\App\Http\Controllers\API\ProductController::class,"searchBycategory"])
->name("searchBycategory");

Route::post("search",[\App\Http\Controllers\API\ProductController::class,"search"])
->name("search");

Route::post("Trendingproducts",[\App\Http\Controllers\API\ProductController::class,"Trendingproducts"])
->name("Trendingproducts");

});