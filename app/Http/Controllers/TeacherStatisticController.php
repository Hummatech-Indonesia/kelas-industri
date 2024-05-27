<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherStatisticController extends Controller
{
    public function index()
    {
        return view('teacher-statistic');
    }
}
