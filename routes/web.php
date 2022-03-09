<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController; 
use App\Http\Controllers\ReservationController;

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

Route::get('/', [RoomController::class,'index']);
Route::get('/home', [RoomController::class,'index']);

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/room', RoomController::class);
Route::resource('/reservation', ReservationController::class);

Route::get('/room/{id}/ConfirmDelete', [RoomController::class,'ConfirmDelete']);
Route::get('/room/{id}/RoomReservation', [RoomController::class,'show']);

Route::post('/RoomReservation/{id}', [ReservationController::class,'store']);
Route::get('/reservation/{id}/ConfirmDelete', [reservationController::class,'ConfirmDelete']);

Route::get('/reservation/{id}/finish', [reservationController::class,'ConfirmFinish']);
Route::put('/reservation/{id}/finish', [reservationController::class,'Finish']);

Auth::routes();

