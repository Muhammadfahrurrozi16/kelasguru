<?php

use App\Http\Controllers\UserControllers;
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
Route::get('/', function () {
    return view('Front.Home');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', function () {
        return view('Back.Admin.Dashboard', ['type_menu' => '']);
    })->name('Home')->middleware();
    Route::get('/home/admin', function () {
        return view('Back.Superadmin.Dashboard', ['type_menu' => '']);
    })->name('/home/admin');
    Route::get('profile.edit', function () {
        return view('Back.Profil', ['type_menu' => '']);
    })->name('profile.edit');
    Route::resource('user', UserControllers::class);
});
