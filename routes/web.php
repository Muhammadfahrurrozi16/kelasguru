<?php

use Illuminate\Support\Facades\Route;

use function PHPSTORM_META\type;

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

Route::get('/Login', function () {
    return view('auth.login', ['type_menu' => '']);
});
Route::get('/', function(){
    // notify()->success('Welcome to Laravel Notify ⚡️');
    notify()->delete('laravel delete');
    return view('Front.Home');
});


Route::middleware(['auth','verified'])->group(function(){
    Route::get('home', function(){
        notify()->success('Welcome to Laravel Notify ⚡️');
        return view('Back.Admin.Dashboard', ['type_menu' => '']);
    })->name('Home')->middleware();
    Route::get('/home/admin', function(){
        notify()->success('Welcome to Laravel Notify ⚡️');
        return view('Back.Superadmin.Dashboard', ['type_menu' => '']);
    })->name('/home/admin');
    Route::get('profile.edit', function() {
        return view('Back.Profil', ['type_menu' => '']);
    })->name('profile.edit');
});

