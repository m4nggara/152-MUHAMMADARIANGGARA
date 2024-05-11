<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/discover', function () {
    return view('discover');
})->name('discover');

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/destination', function () {
    return view('destination');
})->name('destination');
