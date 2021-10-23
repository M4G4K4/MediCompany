<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
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

Route::post('register',[AuthController::class, 'register'])->name('auth.register');

Route::post('login',[AuthController::class, 'login'])->name('auth.login');

Route::post('getDetails',[AuthController::class, 'getDetails'])->name('auth.getDetails')->middleware('auth:api');
Route::post('fillDetails',[AuthController::class, 'fillDetails'])->name('auth.fillDetails')->middleware('auth:api');

Route::get('getAllPatients',[AuthController::class, 'getPatients'])->name('getPatients')->middleware('auth:api');

Route::get('/view/{key}/{id}',[HomeController::class,'view'])->name('view');
