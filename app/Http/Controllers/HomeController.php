<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        if (in_array(auth()->user()->roles->pluck('name')[0], ['admin', 'school'])) {
            return view('dashboard.admin.pages.home');
        }

        return view('dashboard.user.pages.home');
    }
}
