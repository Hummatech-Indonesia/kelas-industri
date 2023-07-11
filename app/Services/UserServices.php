<?php

namespace App\Services;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\MentorRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserPasswordRequest;

class UserServices
{

    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * handle update profile
     *
     * @param ProfileRequest $request
     * @param User $user
     * @return void
     */
    public function handleUpdateProfile(ProfileRequest $request, User $user): void
    {
        $data = $request->validated();

        if ($request->avatar_remove == 1 && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
            $data['photo'] = null;
        }

        if ($request->hasFile('photo')) {
            if (Storage::exists('public/' . $user->photo)) Storage::delete('public/' . $user->photo);

            $data['photo'] = $request->file('photo')->store('user_photo', 'public');
        }

        $this->repository->update($user->id, $data);
    }

    Public function handleUpdatePassword(PasswordRequest $request , User $user) :mixed
    {
        $data = $request->validated();

        if (!Hash::check($request->get('current_password'), $user->password)) {
            return redirect()->back()->with('error', "Kata Sandi Saat Ini Tidak Valid");
        }

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return redirect()->back()->with("error", "Kata sandi baru tidak boleh sama dengan kata sandi saat ini Anda.");
        }

        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        $this->repository->update($user->id, $data);
        return redirect()->back()->with("success", "Kata sandi telah diperbarui.");

    }

    /**
     * handle get all school
     *
     * @return mixed
     */
    public function handleGetAllSchool(): mixed
    {
        return $this->repository->get_schools();
    }

    /**
     * handle get all mentor
     *
     * @return mixed
     */
    public function handleGetAllMentor(): mixed
    {
        return $this->repository->get_mentors();
    }

    public function handleGetAllStudent(): mixed
    {
        return $this->repository->get_students();
    }

    /**
     * handle get mentors
     *
     * @return mixed
     *
     */
    public function handleGetMentor(): mixed
    {
        return $this->repository->get_mentors();
    }

    /**
     * store mentor
     *
     * @param MentorRequest $request
     * @return void
     */
    public function handleCreateMentor(MentorRequest $request): void
    {
        $data = $request->validated();
        $data['password'] = bcrypt('password');

        $user = $this->repository->store($data);
        $user->assignRole('mentor');
    }

    /**
     * update mentor
     *
     * @param MentorRequest $request
     * @param User $mentor
     * @return void
     */
    public function handleUpdateMentor(MentorRequest $request, User $mentor): void
    {
        $data = $request->validated();

        $this->repository->update($mentor->id, $data);
    }

    /**
     * handle delete mentor
     *
     * @param User $mentor
     * @return bool
     */
    public function handleDeleteMentor(User $mentor): bool
    {
        return $this->repository->destroy($mentor->id);
    }

    /**
     * handle get mentors
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function handleGetTeacher(): mixed
    {
        return $this->TeacherMockup($this->repository->get_mentors());
    }

    /**
     * store mentor
     *
     * @param TeacherRequest $request
     * @return void
     */
    public function handleCreateTeacher(TeacherRequest $request): void
    {
        $data = $request->validated();
        $data['password'] = bcrypt('password');

        $user = $this->repository->store($data);
        $user->assignRole('mentor');
    }

    /**
     * update mentor
     *
     * @param TeacherRequest $request
     * @param User $mentor
     * @return void
     */
    public function handleUpdateTeacher(TeacherRequest $request, User $mentor): void
    {
        $data = $request->validated();

        $this->repository->update($mentor->id, $data);
    }

    /**
     * handle delete mentor
     *
     * @param User $mentor
     * @return bool
     */
    public function handleDeleteTeacher(User $mentor): bool
    {
        return $this->repository->destroy($mentor->id);
    }

    public function handleChangePassword(UserPasswordRequest $request, string $id): void
    {
        $data = $request->validated();

        $this->repository->update($id, [
            'password' => bcrypt($data['password']),
        ]);
    }

    public function handleCreatePoint($point, $studentId) :mixed
    {
        return $this->repository->create_point($point, $studentId);
    }

}
