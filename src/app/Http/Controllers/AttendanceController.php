<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function attendance()
    {
        return view('attendance');
    }

}
