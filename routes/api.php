<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('dani', \App\Http\Controllers\DanController::class);
    Route::resource('termini', \App\Http\Controllers\TerminController::class);
    Route::resource('treninzi', \App\Http\Controllers\TreningController::class);
    Route::resource('rasporedi', \App\Http\Controllers\RasporedController::class);
});
