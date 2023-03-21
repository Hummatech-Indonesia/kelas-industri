<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        $data = [
            'user' => auth()->user()
        ];

        return view('dashboard.admin.pages.profile.index', $data);
    }
}
