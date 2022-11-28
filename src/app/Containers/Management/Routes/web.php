<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use App\Containers\Management\Http\Controllers\RoleController;
use App\Containers\Management\Http\Controllers\UserController;

Route::controller(UserController::class)->prefix('platform/profile')->as('platform.profile.')->group(function () {
    Route::get('/', 'profile')->name('index');
    Route::post('/updateProfile', 'updateProfile')->name('updateProfile');
});

Route::controller(UserController::class)->prefix('platform/users')->as('platform.users.')->group(function () {

    Route::get('/', 'index')->name('index')
        ->middleware('permission:users.index');

    Route::get('/edit/{id}', 'edit')->name('edit')
        ->middleware('permission:users.edit');

    Route::put('/update/{id}', 'update')->name('update')
        ->middleware('permission:users.edit');

    Route::get('/create', 'create')->name('create')
        ->middleware('permission:users.create');

    Route::post('/store', 'store')->name('store')
        ->middleware('permission:users.create');

    Route::get('/destroy/{id}', 'destroy')->name('destroy')
        ->middleware('permission:users.delete');

    Route::post('/destroy', 'destroySelected')->name('destroySelected')
        ->middleware('permission:users.delete');
});

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

