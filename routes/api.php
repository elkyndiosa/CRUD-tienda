<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('stores', 'StoreController@index');
Route::post('add-store', 'StoreController@create');
Route::get('store/{id}', 'StoreController@get');
Route::post('add-product', 'ProductController@create');
Route::post('edit-product', 'ProductController@edit');
Route::get('delete-product/{id}', 'ProductController@delete');
