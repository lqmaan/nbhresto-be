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

//Product Route
Route::get('/product', 'productController@getAllProducts');
Route::post('/product/new', 'productController@insertNewProduct');
Route::put('/product/update', 'productController@updateProduct');
Route::delete('/product/delete/{product_id}', 'productController@deleteProduct');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
