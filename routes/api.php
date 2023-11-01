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

Route::post('/quotation-get-query', 'App\Http\Controllers\QuotationController@getQuery');
Route::post('/get-price', 'App\Http\Controllers\QuotationController@getPrice');
Route::post('/add-quotation', 'App\Http\Controllers\QuotationController@addQuotation');
