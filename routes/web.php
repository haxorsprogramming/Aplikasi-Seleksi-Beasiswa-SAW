<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', [HomeController::class, 'homePage']);

Route::group(['prefix'=>'auth'], function (){
    Route::group(['prefix'=>'login'], function (){
        Route::get('/', [AuthController::class, 'loginPage']);
        Route::post('/process', [AuthController::class, 'loginProcess']);
    });
    Route::get('/logout', [AuthController::class, 'logOut']);
});

Route::group(['prefix'=>'app'], function (){
    Route::get('/{token}', [DashboardController::class, 'dashboardPage']);
    Route::group(['prefix'=>'core'], function (){
        Route::get('/beranda', [DashboardController::class, 'berandaPage']);
        // event
        Route::group(['prefix'=>'event'], function (){
            Route::get('/', [EventController::class, 'eventPage']);
            Route::post('/add', [EventController::class, 'addProcess']);
            Route::post('/delete', [EventController::class, 'deleteProcess']);
            Route::post('/update', [EventController::class, 'updateProcess']);
            Route::group(['prefix'=>'api'], function (){
               Route::post('/detail', [EventController::class, 'apiDetail']);
            });
        });
        // mahasiswa
        Route::group(['prefix'=>'mahasiswa'], function (){
            Route::get('/', [MahasiswaController::class, 'mahasiswaPage']);
        });
    });
});
