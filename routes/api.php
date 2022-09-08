<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\System\ManPowerController;
use App\Http\Controllers\System\ManPowerListController;
use App\Models\ManPower;
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

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::group([
    'middleware' => ['auth:sanctum']
], function(){
    Route::post('logout', [AuthController::class, 'logout']);

    Route::controller(ManPowerListController::class)->group(function(){
        Route::post('man_power_add', 'check_store_ability');
        Route::put('add_via_list/{id}', 'add_via_list');
        Route::put('man_power_deficit', 'destroy');
    });

    Route::controller(ManPowerController::class)->group(function(){
        Route::get('get_man_power/{id}', 'get_man_power_data');
    });
});

