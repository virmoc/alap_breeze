<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ingatlanok', [termekController::class, 'index']);
Route::get('/ingatlanok/{ingatlanok}', [termekController::class, 'show']);
Route::delete('/ingatlanok/{id}', [termekController::class, 'delete']);
Route::post('/ingatlanok', [termekController::class, 'store']);

Route::get('/kategoriak', [termekController::class, 'index']);
Route::get('/kategoriak/{kategoriak}', [termekController::class, 'show']);
