<?php

use App\Http\Controllers\EventController;
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

Route::get('/v1/events', [EventController::class, 'allEvents']);
Route::get('/v1/events/{id}', [EventController::class, 'getAnEvent']);
Route::post('/v1/events', [EventController::class, 'addEvent']);
Route::put('/v1/events/{id}', [EventController::class, 'updateAnEvent']);
Route::delete('/v1/events/{id}', [EventController::class, 'deleteEvent']);
