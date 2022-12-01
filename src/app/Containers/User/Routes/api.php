<?php

use App\Containers\User\Http\Controllers\UserController;
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
Route::controller(UserController::class)->prefix('platform/users')
    ->middleware('auth:sanctum')->group(function () {

        Route::get('/', 'list')->middleware('permission:users.index');

        Route::get('/simple', 'simpleList')->middleware('permission:users.index');

        Route::get('/get/{id}', 'edit')->middleware('permission:users.edit');

        Route::put('/update/{id}', 'update')->middleware('permission:users.edit');

        Route::post('/store', 'store')->middleware('permission:users.create');

        Route::delete('/destroy', 'destroySelected')->middleware('permission:users.delete');

        // get simple info user
        Route::get('/me', 'me');
 });
