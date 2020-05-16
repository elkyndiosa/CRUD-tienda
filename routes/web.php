<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/{option?}/{opt2?}/{opt3?}', function () {
    return view('home');
})->middleware('auth');
