<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [AttendanceController::class, 'register']);


Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'attendance']);
});
