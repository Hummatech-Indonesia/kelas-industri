<?php

namespace App\Services;

use App\Repositories\UserRepository;

class LoginService
{
    /**
     * handleLogin
     *
     * @param  mixed $request
     * @return mixed
     */
    public function handleLogin($request, UserRepository $user): mixed
    {
        $data['email'] = $request->email;
        $user = $user->getWhere($data);

        $role = $user->roles->pluck('name')[0];

        if ($role == 'student') {
            if ($user->status == 'active') {
                if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect()->route('home')->with('success', 'Berhasil Login.');
                } else {
                    return redirect()->back()->withErrors(trans('auth.login_failed'))->withInput();
                }
            }else{
                return redirect()->back()->with('error', 'Anda tidak dapat login sekarang, tunggu admin mengkonfirmasi akun anda');
            }
        }
        if ($role == 'admin' || $role == 'school' || $role == 'teacher' || $role == 'mentor') {
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home')->with('success', 'Berhasil Login.');
            } else {
                return redirect()->back()->withErrors(trans('auth.login_failed'))->withInput();
            }
        }
    }
}
