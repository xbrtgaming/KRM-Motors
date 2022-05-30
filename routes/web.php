<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home.index')->name('home');

Route::middleware(['admin'])->group(function () {
    Route::get('/dasbor', [DashboardController::class, 'index'])->name('dasbor');
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'user')->name('user');
        Route::post('/admin_register', 'admin_register')->name('admin_register');
        Route::get('/user_delete/{id}', 'user_delete')->name('user_delete');
        Route::post('/user_edit/{id}', 'user_edit')->name('user_edit');
    });

    Route::controller(CarController::class)->group(function () {
        Route::get('/car', 'car')->name('car');
        Route::get('/car/detail/{id}', 'car_detail')->name('car_detail');
        Route::post('/car_add', 'car_add')->name('car_add');
        Route::get('/car_date', 'search_date')->name('search_date');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login_act', 'authenticate')->name('login_act');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');
    Route::post('/user_register', 'user_register')->name('user_register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/find_car', [CarController::class, 'findcar'])->name('find_car');
});
