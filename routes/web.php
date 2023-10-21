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

Route::get('/admin/menu', function(){
    return view('admin-menu');
});

Route::get('/admin/menu/meals', function(){
    return view('admin-menu-meals');
});

Route::get('/admin/menu/ala-carte', function(){
    return view('admin-menu-ala-carte');
});

Route::get('/admin/menu/group-meals', function(){
    return view('admin-menu-group-meals');
});

Route::get('/admin/menu/desserts', function(){
    return view('admin-menu-dessert');
});

Route::get('/admin/menu/beverages', function(){
    return view('admin-menu-beverages');
});


Route::get('/order-now/lechon-house', function () {
    return view('order-now');
});

Route::get('/order-now/chinese-kitchen', function () {
    return view('order-now-chinese-kitchen');
});


