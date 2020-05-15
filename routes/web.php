<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/{option?}/{opt?}', function () {
    return view('home');
})->middleware('auth');


