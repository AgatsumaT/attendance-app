<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TimestampsController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [AttendanceController::class, 'register']);


Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'attendance']);
    Route::post('/punchin', 'App\Http\Controllers\TimestampsController@punchIn')->name('timestamp/punchin');
    Route::post('/punchout', 'App\Http\Controllers\TimestampsController@punchOut')->name('timestamp/punchout');
    Route::post('/breakin', 'App\Http\Controllers\TimestampsController@breakIn')->name('breakstamp/breakin');
    Route::post('/breakout', 'App\Http\Controllers\TimestampsController@breakOut')->name('breakstamp/breakout');
});
 