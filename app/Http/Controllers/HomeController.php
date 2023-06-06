<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use App\Traits\DataSidebar;

class HomeController extends Controller
{
    use DataSidebar;
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
        $data = $this->GetDataSidebar();
        return view('dashboard.user.pages.home', $data);
    }
}
