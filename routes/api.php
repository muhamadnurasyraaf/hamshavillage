<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

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

//users
Route::get('/users',[UserController::class,'index']);
Route::prefix('/user')->group( function(){
    Route::post('/store',[UserController::class,'store']);
    Route::put('/update',[UserController::class,'update']);
    Route::delete('/delete',[UserController::class,'destroy']);
    Route::get('/faker',[UserController::class,'create']);
});

//Rooms
Route::get('/rooms',[RoomController::class,'index']);
Route::prefix('/room')->group( function(){
    Route::post('/store',[RoomController::class,'store']);
    Route::put('/update',[RoomController::class,'update']);
    Route::delete('/delete',[RoomController::class,'destroy']);
    Route::get('/faker',[RoomController::class,'create']);
});

//Bookings
Route::get('/bookings',[BookingController::class,'index']);
Route::prefix('/booking')->group( function(){
    Route::post('/store',[BookingController::class,'store']);
    Route::put('/update',[BookingController::class,'update']);
    Route::delete('/delete',[BookingController::class,'delete']);
    Route::get('/{id}',[BookingController::class,'show']);
    Route::get('/faker',[BookingController::class,'create']);
});




