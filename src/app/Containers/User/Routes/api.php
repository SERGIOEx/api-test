<?php

use App\Containers\User\Http\Controllers\UserController;
use Illuminate\Http\Request;

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
/*
Route::prefix('user')->group(function () {

    // get companies list


    // add companies


})->middleware('auth:sanctum');*/

Route::prefix('user')->group(function () {

    // get companies with user
    Route::get('/companies', [UserController::class, 'getCompanyList']);

});
