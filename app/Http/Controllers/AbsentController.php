<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class AbsentController extends Controller
{
    public function index () : View
    {
        return view('dashboard.user.pages.absent.index');
    }
}
