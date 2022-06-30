<?php

use Illuminate\Http\Request;
use Sandeep\Aparajitha_PPP\Http\Controllers\RegisterController;


Route::group(['middleware' => ['web']], function () {
    Route::get('register',[RegisterController::class,'register'])->name('register')->middleware('guest');
    Route::post('register',[RegisterController::class,'register_action'])->middleware('guest');

    Route::get('login',[RegisterController::class,'login'])->name('login')->middleware('guest');
    Route::post('login',[RegisterController::class,'login_action'])->middleware('guest');
    Route::post('logout',[RegisterController::class,'logout'])->middleware('auth');

    Route::get('/',[RegisterController::class,'home'])->name('home')->middleware('auth');
    Route::get('/change_password',[RegisterController::class,'change_password'])->name('change_password')->middleware('auth');
    Route::post('/change_password',[RegisterController::class,'change_password_action'])->middleware('auth');

    

});

// Route::get('/',[ProductController::class,'products_get']);

