<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\AuthSessionController;

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

Route::post('token-login', [AuthController::class, 'login']);
Route::post('token-register', [AuthController::class, 'register']);
Route::post('token-logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('login', [AuthSessionController::class, 'login']);
Route::post('register', [AuthSessionController::class, 'register']);
Route::post('logout', [AuthSessionController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['middleware'=> ['auth:sanctum']], function (){
    Route::get('test', function (){
        return  'auth bolgan url';
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});


