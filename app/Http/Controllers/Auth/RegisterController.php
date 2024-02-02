<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Services\UserServices;
use App\Services\RegisterService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Repositories\StudentRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\StudentClassroomRepository;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    private UserServices $userService;
    private RegisterService $service;
    private UserRepository $user;
    private StudentRepository $student;
    private StudentClassroomRepository $studentClassroom;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServices $userService, RegisterService $service, UserRepository $user, StudentRepository $student, StudentClassroomRepository $classroom)
    {
        $this->userService = $userService;
        $this->service = $service;
        $this->user = $user;
        $this->student = $student;
        $this->classroom = $classroom;
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return View
     */
    public function showRegistrationForm(): View
    {
        $schools = $this->userService->handleGetAllSchool();
        return view('auth.register', compact('schools'));
    }

    /**
     * Handle school registration form
     *
     * @param RegisterRequest $request
     *
     * @return RedirectResponse
     */

     public function register(RegisterRequest $request)
     {
         $this->service->handleRegistration($request, $this->user, $this->student, $this->classroom);

         return redirect()->back()->with('success', trans('alert.add_success'));
     }
}
