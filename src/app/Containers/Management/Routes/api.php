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

Route::controller(RoleController::class)->prefix('platform/roles')->as('platform.roles.')->group(function () {

    Route::get('/', 'index')->name('index')
        ->middleware('permission:roles.index');

    Route::get('/edit/{id}', 'edit')->name('edit')
        ->middleware('permission:roles.edit');

    Route::put('/update/{id}', 'update')->name('update')
        ->middleware('permission:roles.edit');

    Route::get('/create', 'create')->name('create')
        ->middleware('permission:roles.create');

    Route::post('/store', 'store')->name('store')
        ->middleware('permission:roles.create');

    Route::get('/destroy/{id}', 'destroy')->name('destroy')
        ->middleware('permission:roles.delete');
});
