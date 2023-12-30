<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/storagelink',function(){
    Artisan::call('storage:link');
    return "Storage link created";
});


Route::get('/{any}', function () {
    return view('welcome'); // Return the welcome.blade.php file for all routes
})->where('any', '.*');


