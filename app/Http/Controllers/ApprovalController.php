<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApprovalRequest;
use App\Models\User;
use App\Services\UserServices;
use App\Repositories\UserRepository;
use App\Services\ClassroomService;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    private ClassroomService $classroom;
    private UserServices $service;
    private UserRepository $userRepository;

    public function __construct(UserServices $service, UserRepository $userRepository, ClassroomService $classroom)
    {
        $this->service = $service;
        $this->userRepository = $userRepository;
        $this->classroom = $classroom;
    }

    public function studentRegistration(Request $request)
    {
        $users = $this->service->handleUserNonActive($request);
        $schools = $this->service->handleGetAllSchool();
        return view('dashboard.admin.pages.approval.index', compact('users', 'schools'));
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

    public function approveAll(ApprovalRequest $request)
    {
        // dd($request->all());
        // $request->validated();
        $data['status'] = 'active';
        $this->service->storeUserActiveAll($request['select'], $data);
        return redirect()->back();
    }

    // public function filterBySchool(Request $request)
    // {
    //     $schoolId = $request->input('school_id');
    //     $users = $this->classroom->getUsersBySchoolId($schoolId);

    //     return view('dashboard.admin.pages.approval.index', compact('users'));
    // }
}
