<?php

use App\Http\Controllers\PaymentController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccBankController;
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
    Route::get('/find/{id}',[BookingController::class,'show']);
    Route::get('/faker',[BookingController::class,'create']);
});

//banks
Route::get('/banks',[AccBankController::class,'index']);
Route::prefix('/bank')->group( function(){
    Route::put('/update',[AccBankController::class,'update']);
    Route::get('/faker',[AccBankController::class,'create']);
});

Route::post('/payment/store',[PaymentController::class,'store']);


