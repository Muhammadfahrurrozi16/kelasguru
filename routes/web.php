<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login', ['type_menu' => '']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('home', function(){
        return view('pages.Dashboard', ['type_menu' => '']);
    })->name('Home');
    Route::get('/home/admin', function(){
        return view('pages.Dashboard', ['type_menu' => '']);
    })->name('/home/admin');
});
