<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeleteController;

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

Route::middleware(['auth','verified'])->group(function (){
    //UserController
    Route::get('users', [UserController::class, 'index'])->name('users');


    //ProfileController
    Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile');


    //CreateController
    Route::middleware('admin')->group(function (){
        Route::controller(CreateController::class)->group(function () {
            Route::get('create', 'show')->name('create');
            Route::post('create', 'store')->name('create.store');
        });
    });


    //StatusController
    Route::controller(StatusController::class)->group(function () {
        Route::get('status/{id}', 'show')->name('status');
        Route::post('status/{id}', 'store')->name('status.store');
    });


    //MediaController
    Route::controller(MediaController::class)->group(function () {
        Route::get('media/{id}', 'show')->name('media');
        Route::post('media/store/{id}', 'store')->name('media.store');
    });

    //SecurityController
    Route::controller(SecurityController::class)->group(function () {
        Route::get('security/{id}', 'show')->name('security');
        Route::post('security/{id}', 'store')->name('security.store');
    });

    //EditController
    Route::controller(EditController::class)->group(function () {
        Route::get('edit/{id}', 'show')->name('edit.show');
        Route::post('edit/{id}', 'store')->name('edit.store');
    });

    Route::get('delete/{id}', [DeleteController::class, 'destroy'])->name('delete');
});

require __DIR__.'/auth.php';
