<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;


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
        Route::get('/print', 'print')->name('print');
        Route::get('/car_edit/{id}', 'car_edit')->name('car_edit');
        Route::post('/car_update/{id}', 'car_update')->name('car_update');
        Route::get('/car_delete/{id}', 'car_delete')->name('car_delete');
    });

    Route::controller(MessageController::class)->group(function () {
        Route::get('/message', 'message')->name('message');
        Route::post('/message_add', 'message_add')->name('message_add');
        Route::get('/message_confirm/{id}', 'message_confirm')->name('message_confirm');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'category')->name('category');
        Route::post('/category_add', 'category_add')->name('category_add');
        Route::get('/category_delete/{id}', 'category_delete')->name('category_delete');
    });

    Route::controller(BrandController::class)->group(function () {
        Route::get('/brand', 'brand')->name('brand');
        Route::post('/brand_add', 'brand_add')->name('brand_add');
        Route::get('/brand_delete/{id}', 'brand_delete')->name('brand_delete');
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
    Route::get('/find_car', [HomeController::class, 'findcar'])->name('find_car');
    Route::get('/find_detail/{id}', [HomeController::class, 'find_detail'])->name('find_detail');
    Route::post('/message_send', [HomeController::class, 'message_send'])->name('message_send');
});
