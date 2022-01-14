<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [EventController::class, 'allEventsView']);
Route::get('/events/{id}', [EventController::class, 'getSingleEvent']);
Route::get('/events/{id}/edit', [EventController::class, 'editEvent']);
Route::get('/add-event', [EventController::class, 'addEventView']);
Route::post('/create-event', [EventController::class, 'createEvent'])->name('create.event');
Route::put('/update-event', [EventController::class, 'updateEvent'])->name('update.event');



// calling external api(s)
Route::get('/posts', [EventController::class, 'getAllPost']);