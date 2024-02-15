<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserServices;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    private UserServices $service;
    private UserRepository $userRepository;

    public function __construct(UserServices $service, UserRepository $userRepository)
    {
        $this->service = $service;
        $this->userRepository = $userRepository;
    }

    public function studentRegistration(Request $request)
    {
        $users = $this->service->handleUserNonActive($request);
        return view('dashboard.admin.pages.approval.index', compact('users'));
    }

    /**
     * verification
     *
     * @param  mixed $company
     * @return void
     */
    public function approve(User $user)
    {
        $this->userRepository->update($user->id, ['status' => 'active']);

        return redirect()->back()->with('success', 'Berhasil Menyetujui Siswa ' . $user->name);
    }
}
