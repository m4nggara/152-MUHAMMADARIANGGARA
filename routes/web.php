<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

Route::get('login', function () {
    return view('admin.pages.login');
})->name('login');

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('items', ItemsController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UsersController::class);
    Route::resource('roles', RolesController::class);
});

