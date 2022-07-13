<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarrerasController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('carreras',CarreraController::class);

Route::get('/carreras', [CarrerasController::class, 'index']);
Route::post('/carreras', [CarrerasController::class, 'store']);
Route::get('/carreras/{id}', [CarrerasController::class, 'show']);
Route::put('/carreras/{id}', [CarrerasController::class, 'update']);
Route::delete('/carreras/{id}', [CarrerasController::class, 'destroy']);
