<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;


Route::get('/', [PageController::class, 'home'])->name('home');


Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/signup', [UserController::class, 'postSignup'])->name('postSignup');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'postLogin'])->name('admin.postLogin');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::resource('/products', ProductController::class)->only(['show']);


Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
	Route::resource('/products', ProductController::class)->except(['show']);
});