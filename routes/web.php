<?php

use Illuminate\Http\Request;
use App\Http\Middleware\ItemViewer;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscoverController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DestinationController;

/* Route Global */
Route::match(['get','post'], '/', HomeController::class)->name('home');
Route::match(['get','post'], '/discover', DiscoverController::class)->name('discover');
Route::match(['get', 'post'], '/product', [ProductController::class, 'list'])->name('product');
Route::match(['get','post'], '/destination', [DestinationController::class, 'list'])->name('destination');
Route::match(['get','post'], '/search', [SearchController::class, 'index'])->name('search');
Route::match(['get', 'post'],'/detail/{slug}', [ItemsController::class, 'show'])->middleware(ItemViewer::class)->name('detail');
/* End Global */

/* Route Auth */
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware(Authenticate::class);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
/* End Auth */

/* Route Admin */
Route::prefix('admin')->as('admin.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('items', ItemsController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('users', UsersController::class);
        Route::resource('roles', RolesController::class);
        Route::prefix('profile')->as('profile.')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::post('/', [ProfileController::class, 'edit'])->name('edit');
            Route::get('/settings', [ProfileController::class, 'setting'])->name('setting');
            Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('password.update');
        });
    });
});
/* End Admin */


