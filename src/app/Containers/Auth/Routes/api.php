<?php

use App\Containers\Auth\Http\Controllers\API\AuthController;
use App\Containers\Auth\Http\Controllers\API\RegisterController;
use Illuminate\Support\Facades\Route;
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

Route::prefix('auth')->group(function () {

    // register user
    Route::post('/register', RegisterController::class);

    // auth user
    Route::post('/login', [AuthController::class, 'login']);

    // logout user
    Route::post('/logout', [AuthController::class, 'logout']);

    // is authorize
    Route::get('/authorized', [AuthController::class, 'isAuthorized']);

    // forgot password

    // confirm change password
});
