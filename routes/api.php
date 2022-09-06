<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AdvertisementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(UserController::class)->group(function(){
    Route::post('/register', 'store');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::controller(AdvertisementController::class)->group(function() {
        Route::get('/advertisements', 'index')->name('advertisements.index');
        Route::get('/advertisements/{id}', 'show')->name('advertisements.show');
        Route::post('/advertisements', 'store')->name('advertisements.store');
        Route::put('/advertisements/{id}', 'update')->name('advertisements.update');
        Route::delete('/advertisements/{id}', 'destroy')->name('advertisements.delete');
        Route::get('/advertisements/product/{product_id}', 'getAdvertisementByProduct')->name('advertisements.product');
    });

    Route::controller(UserController::class)->group(function(){
        Route::post('/logout', 'logout');
    });


});
