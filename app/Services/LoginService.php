<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
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

        if($user->status == 'nonactive')
        {
            return redirect()->back()->with('error', 'Anda tidak dapat login sekarang, tunggu admin mengkonfirmasi akun anda');
        }
    }
}
