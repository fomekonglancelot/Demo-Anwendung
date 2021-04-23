<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;

use Illuminate\Support\Facades\App;



Route::get('/', [UsersController::class, 'index'])->name('users.index');

Route::get('/create', [UsersController::class, 'create'])->name('users.create');


Route::post('/store', [UsersController::class, 'store'])->name('users.store');


