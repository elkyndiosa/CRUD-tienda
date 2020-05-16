<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/{option?}/{optionid?}', function () {
    return view('home');
})->middleware('auth');
