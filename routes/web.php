<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'homePage']);

Route::group(['prefix'=>'auth'], function (){
    Route::group(['prefix'=>'login'], function (){
        Route::get('/', [AuthController::class, 'loginPage']);
        Route::post('/process', [AuthController::class, 'loginProcess']);
    });
});

Route::get('/app/{token}', [DashboardController::class, 'dashboardPage']);
