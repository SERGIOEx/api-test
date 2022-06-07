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

Route::prefix('user')->group(function () {

    // register user
    Route::post('/register', RegisterController::class);

    // auth user
    Route::post('/sign-in', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
