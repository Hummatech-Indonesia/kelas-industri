<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    private LoginService $loginService;
    private UserRepository $user;

    public function __construct(LoginService $loginService, UserRepository $user)
    {
        $this->loginService = $loginService;
        $this->user = $user;
    }

    /**
     * Handle user login.
     *
     * This function is responsible for handling user login requests.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request The incoming login request.
     * @return \Illuminate\Http\JsonResponse Returns a JSON response.
     */
    public function login(LoginRequest $request)
    {
        return $this->loginService->handleLogin($request, $this->user);
    }
}
