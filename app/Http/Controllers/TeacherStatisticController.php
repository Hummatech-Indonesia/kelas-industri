<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherStatisticController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.pages.teacher-statistic.index');
    }
}
