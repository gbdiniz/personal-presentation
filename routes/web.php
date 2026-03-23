<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
    // return view('welcome');
});

Route::get('/intro', function () {
    return view('intro');
});
