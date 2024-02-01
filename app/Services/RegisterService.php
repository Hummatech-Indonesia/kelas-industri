<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use App\Repositories\StudentRepository;

class RegisterService
{

    /**
     * handleRegistration
     *
     * @param  RegisterRequest $request
     * @param  UserInterface $user
     * @return void
     */
    public function handleRegistration(RegisterRequest $request, UserRepository $user, StudentRepository $student)
    {

        $data = $request->validated();
        $data['password'] = bcrypt('password');
        $data['status'] = 'nonactive';

        $users = $user->store($data);
        event(new Registered($users));

        $users->assignRole('student');

        $student->store([
            'student_id' => $users->id,
            'school_id' => $data['school_id'],
        ]);

    }

}
