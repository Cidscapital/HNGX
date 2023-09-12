<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//public route
Route::post('/', [PersonController::class, 'store']);
Route::get('/', [PersonController::class, 'index']);
Route::get('/{name}', [PersonController::class, 'showByName']);
Route::get('/{id}', [PersonController::class, 'showById']);
Route::put('/{name}', [PersonController::class, 'editByName']);
Route::put('/{id}', [PersonController::class, 'editById']);
Route::delete('/{name}', [PersonController::class, 'deleteByName']);
Route::delete('/{id}', [PersonController::class, 'deleteById']);
