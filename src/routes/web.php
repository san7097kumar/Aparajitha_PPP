<?php

use Illuminate\Http\Request;
use Sandeep\Aparajitha_PPP\Http\Controllers\RegisterController;


Route::group(['middleware' => ['web']], function () {
    Route::get('user',[RegisterController::class,'user'])->name('user')->middleware('auth');
    Route::post('user',[RegisterController::class,'user_action'])->name('user_action')->middleware('auth');

    Route::get('login',[RegisterController::class,'login'])->name('login')->middleware('guest');
    Route::post('login',[RegisterController::class,'login_action'])->middleware('guest');
    Route::post('logout',[RegisterController::class,'logout'])->name('logout')->middleware('auth');

    Route::get('/',[RegisterController::class,'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('/home',[RegisterController::class,'dashboard'])->name('dashboard')->middleware('auth');

    Route::get('/change_password',[RegisterController::class,'change_password'])->name('change_password')->middleware('auth');
    Route::post('/change_password',[RegisterController::class,'change_password_action'])->name('change_password_action')->middleware('auth');

    Route::get('/forgot_password',[RegisterController::class,'forgot_password'])->name('forgot_password')->middleware('guest');
    Route::post('/forgot_password_action',[RegisterController::class,'forgot_password_action'])->name('forgot_password_action')->middleware('guest');

    Route::get('/reset_password/{token}', [RegisterController::class,'getPassword'])->name('get_password')->middleware('guest');
    Route::post('/reset_password', [RegisterController::class,'updatePassword'])->name('update_password')->middleware('guest');

  });

// Route::get('/',[ProductController::class,'products_get']);

