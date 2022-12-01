<?php

use Illuminate\Support\Facades\Route;
use App\Containers\Management\Http\Controllers\RoleController;
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

Route::controller(RoleController::class)->prefix('platform/roles')
    ->middleware('auth:sanctum')->group(function () {

    Route::get('/', 'list')->middleware('permission:roles.index');

    Route::get('/permissions', 'permissions')->middleware('permission:roles.create');

    Route::get('/get/{id}', 'edit')->middleware('permission:roles.edit');

    Route::put('/update/{id}', 'update')->middleware('permission:roles.edit');

    Route::post('/store', 'store')->middleware('permission:roles.create');

    Route::get('/destroy/{id}', 'destroy')->middleware('permission:roles.delete');
});
