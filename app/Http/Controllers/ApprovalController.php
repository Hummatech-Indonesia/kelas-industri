<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\StudentSchool;
use App\Services\UserServices;
use App\Services\StudentService;
use App\Services\ClassroomService;
use App\Repositories\UserRepository;
use App\Http\Requests\ApprovalRequest;
use Illuminate\Support\Facades\Storage;

class ApprovalController extends Controller
{
    private ClassroomService $classroom;
    private UserServices $service;
    private UserRepository $userRepository;
    private StudentService $studentService;

    public function __construct(UserServices $service, UserRepository $userRepository, ClassroomService $classroom, StudentService $studentService)
    {
        $this->service = $service;
        $this->userRepository = $userRepository;
        $this->classroom = $classroom;
        $this->studentService = $studentService;
    }

    public function studentRegistration(Request $request)
    {
        $users = $this->service->handleUserNonActive($request);
        $schools = $this->service->handleGetAllSchool();
        return view('dashboard.admin.pages.approval.index', compact('users', 'schools'));
    }

    public function wrongInput(Request $request)
    {
        $data = [
            'users' => $this->service->handleGetAllStudentWithSchool($request),
            'schools' => $this->service->handleGetAllSchool(),
            'classrooms' => $this->service->handleGetAllClassroom(),
        ];
        return view('dashboard.admin.pages.approval.wrongInput', $data);
    }

    public function updateSchool(Request $request): mixed
    {
        // dd($request->all());
        $this->studentService->handleUpdateSchool($request);
        $this->studentService->handleUpdateClassroom($request);
        return redirect()->back();
    }

    public function deleteUser(User $user): mixed
    {
        if (Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
        }
        
        $this->userRepository->destroy($user->id);
        return redirect()->back()->with('success', 'User berhasil dihapus');
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

        return redirect()->route('admin.studentRegistration')->with('success', 'Berhasil Menyetujui Siswa ' . $user->name);
    }

    public function approveAll(ApprovalRequest $request): mixed
    {
        // dd($request->all());
        // $request->validated();
        $data['status'] = 'active';
        $this->service->storeUserActiveAll($request['select'], $data);
        return redirect()->route('admin.studentRegistration')->with('success', 'Berhasil Menyetujui Siswa');
    }

    // public function filterBySchool(Request $request)
    // {
    //     $schoolId = $request->input('school_id');
    //     $users = $this->classroom->getUsersBySchoolId($schoolId);

    //     return view('dashboard.admin.pages.approval.index', compact('users'));
    // }
}
