<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Traits\DataSidebar;
use App\Services\UserServices;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    use DataSidebar;
    private UserServices $services;

    public function __construct(UserServices $userServices)
    {
        $this->services = $userServices;
    }

    public function edit(): View
    {
        $data = $this->GetDataSidebar();
        if(auth()->user()->roles->pluck('name')[0] == 'admin'){
            $data['user'] = auth()->user();
            return view('dashboard.admin.pages.profile.index', $data);
        }elseif(auth()->user()->roles->pluck('name')[0] == 'school'){
            $data['user'] = auth()->user();
            return view('dashboard.admin.pages.profile.index', $data);
        }else{
            $data['user'] = auth()->user();
            return view('dashboard.user.pages.profile.index', $data);
        }


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
