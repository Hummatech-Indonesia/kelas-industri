<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private UserServices $services;

    public function __construct(UserServices $userServices)
    {
        $this->services = $userServices;
    }

    public function edit(): View
    {
        $data = [
            'user' => auth()->user()
        ];

        return view('dashboard.admin.pages.profile.index', $data);
    }

    /**
     * update profile user
     *
     * @param ProfileRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(ProfileRequest $request, User $user): RedirectResponse
    {
        $this->services->handleUpdateProfile($request, $user);
//        dd($user);
        return to_route('profile.index')->with('success', trans('alert.update_success'));
    }
}
