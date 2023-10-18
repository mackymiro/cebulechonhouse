<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\MenuController;
use App\Livewire\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin/dashboard', function(){
    return view('admin-dashboard');
});

Route::get('/admin/add-categories', function(){
    return view('add-categories');
});

Route::get('/admin/add-meals', function(){
    return view('add-meals');
});


Route::get('/order-now/lechon-house', function () {
    return view('order-now');
});

Route::get('/order-now/chinese-kitchen', function () {
    return view('order-now-chinese-kitchen');
});


