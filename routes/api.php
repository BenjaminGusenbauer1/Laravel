<?php

use Illuminate\Http\Request;

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

//Methoden, für welche keine Authentifizierung notwendig ist
Route::group(['middleware' =>['api', 'cors']], function () {
    Route::post('auth/login', 'Auth\ApiAuthController@login');

    Route::get('books', 'BookController@index');
    Route::get('book/{isbn}', 'BookController@findByISBN');
    Route::get('book/checkisbn/{isbn}', 'BookController@checkISBN');
    Route::get('books/search/{searchTerm}', 'BookController@findBySearchTerm');
});

//Methods with auths
Route::group(['middleware' =>['api', 'cors', 'jwt-auth']], function () {
    Route::post('book', 'BookController@save');
    Route::put('book/{isbn}', 'BookController@update');
    Route::delete('book/{isbn}', 'BookController@delete');
    Route::post('auth/logout', 'Auth\ApiAuthController@logout');
    Route::post('auth/user', 'Auth\ApiAuthController@getCurrentAuthenticationUser');

    Route::get('admin', 'OrderController@index');
    Route::get('order/{id}', 'OrderController@getOrderByID');
    Route::get('orders/{user_id}', 'OrderController@getAllOrdersOfUser');
    Route::post('order', 'OrderController@saveOrder');
    Route::put('status', 'OrderController@saveStatus');
});