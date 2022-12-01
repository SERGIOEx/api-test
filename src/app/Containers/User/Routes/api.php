<?php

use App\Containers\User\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
Route::controller(UserController::class)
    ->prefix('platform/users')->middleware('auth:sanctum')->group(function () {

        Route::get('/', 'list')->middleware('permission:users.index');

        // get simple info user
        Route::get('/me', 'me');


        /*Route::get('/get/{id}', 'edit')->name('edit')
            ->middleware('permission:users.edit');

        Route::put('/update/{id}', 'update')->name('update')
            ->middleware('permission:users.edit');

        Route::post('/store', 'store')->name('store')
            ->middleware('permission:users.create');

        Route::post('/destroy', 'destroySelected')->name('destroySelected')
            ->middleware('permission:users.delete');*/
 });
