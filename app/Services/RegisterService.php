<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use App\Repositories\StudentRepository;
use App\Repositories\StudentClassroomRepository;

class RegisterService
{

    /**
     * handleRegistration
     *
     * @param  RegisterRequest $request
     * @param  UserInterface $user
     * @return void
     */
    public function handleRegistration(RegisterRequest $request, UserRepository $user, StudentRepository $student, StudentClassroomRepository $classroom)
    {

        $data = $request->validated();
        $data['password'] = bcrypt('password');
        $data['status'] = 'nonactive';

        $users = $user->store($data);
        event(new Registered($users));

        $users->assignRole('student');

        $school = $student->store([
            'student_id' => $users->id,
            'school_id' => $data['school_id'],
        ]);

        $classroom->store([
            'student_school_id' => $school->id,
            'classroom_id' => $data['classroom_id'],
        ]);



    }

}
