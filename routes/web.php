<?php

use Illuminate\Http\Request;
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

Route::match(['post', 'get'], '/search', function (Request $request) {
    $term = $request->term;
    return view('search', ['term' => $term]);
})->name('search');

Route::post('/detail', function (Request $request) {
    $slug = $request->slug;
    return view('detail', ['slug' => $slug]);
})->name('detail');

