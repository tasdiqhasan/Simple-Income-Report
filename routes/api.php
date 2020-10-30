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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'incomes'], function() {
    Route::get('/type', 'Api\IncomeTypeController@index');
    Route::get('/', 'Api\IncomeController@index');
    Route::post('/create', 'Api\IncomeController@store');
    Route::post('/{id}/edit', 'Api\IncomeController@update');
    Route::post('/{id}/delete', 'Api\IncomeController@delete');
});

