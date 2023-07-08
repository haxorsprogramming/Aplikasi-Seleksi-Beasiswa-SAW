<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'homePage']);
Route::get('/auth/login', [AuthController::class, 'loginPage']);

