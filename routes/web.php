<?php

use App\Http\Controllers\ExcelController;
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


Route::controller(ExcelController::class)->group(function(){
    Route::get('booking-report', 'downloadBookingReport');
    Route::get('month-wise-report', 'downloadMonthWiseReport');
});
        
Route::get('/', function () {
    return view('welcome');
});
