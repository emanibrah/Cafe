<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test1');
});

Route::get('user', function () {
    return view('test');
});

Route::get('cat', function () {
    return view('test2');
});