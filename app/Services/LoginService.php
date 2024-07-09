<?php

namespace App\Services;

use App\Models\StudentSubmaterialExam;
use App\Models\SubMaterialExam;
use App\Repositories\UserRepository;

use function PHPUnit\Framework\returnSelf;

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
                    if (!isset($user->studentSchool->studentClassroom->classroom_id)) {
                        return redirect('/login')->with('error', 'Anda belum memiliki kelas.');
                    }
                    return redirect()->route('home')->with('success', 'Berhasil Login.');
                } else {
                    return redirect()->back()->withErrors(trans('auth.login_failed'))->withInput();
                }
            } else {
                return redirect()->back()->with('error', 'Anda tidak dapat login sekarang, tunggu admin mengkonfirmasi akun anda');
            }
        }

        if ($role == 'teacher' && !isset($user->teacherSchool->teacherClassroom)) {
            return redirect('/login')->with('error', 'Anda belum memiliki kelas.');
        }

        if ($role == 'admin' || $role == 'school' || $role == 'teacher' || $role == 'mentor' || $role == 'administration') {
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home')->with('success', 'Berhasil Login.');
            } else {
                return redirect()->back()->withErrors(trans('auth.login_failed'))->withInput();
            }
        }
        if ($role == 'tester') {
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                $subMaterialExam = SubMaterialExam::where('title', 'Tester')->first();
                $studenSubmaterialExam = StudentSubmaterialExam::where('student_id', auth()->user()->id)->whereRelation('subMaterialExam', 'sub_material_id', $subMaterialExam->sub_material_id)->first();
                if($studenSubmaterialExam != null && $studenSubmaterialExam->score != null) return redirect()->route('tester.exam.show-finish', ['subMaterialExam' => $subMaterialExam->id, 'studentSubmaterialExam'=> $studenSubmaterialExam->id]);
                return redirect()->route('tester.exam-setname', $subMaterialExam->id)->with('success', 'Berhasil Login.');
            } else {
                return redirect()->back()->withErrors(trans('auth.login_failed'))->withInput();
            }
        }
        // return 'kontol';
    }
}
