<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AttendanceController::class, 'attendance']);

Route::middleware('auth')->group(function () {
    Route::get('/register', [AttendanceController::class, 'register']);
});
