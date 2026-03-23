<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
    // return view('welcome');
});

Route::get('/slide-1', function () {
    return view('slide1');
});
