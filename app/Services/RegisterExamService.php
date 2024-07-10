<?php

namespace App\Services;

use App\Models\User;
use App\Models\StudentSubmaterialExam;
use App\Repositories\ScheduleRepository;
use App\Http\Requests\RegisterExamRequest;
use App\Http\Requests\SubMaterialExamRequest;
use App\Repositories\SubMaterialExamRepository;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class RegisterExamService
{
    private SubMaterialExamRepository $repository;
    private ScheduleRepository $scheduleRepository;
    private SchoolService $schoolService;
    private StudentService $studentService;

    public function __construct(SubMaterialExamRepository $repository, ScheduleRepository $scheduleRepository, SchoolService $schoolService, StudentService $studentService)
    {
        $this->repository = $repository;
        $this->scheduleRepository = $scheduleRepository;
        $this->schoolService = $schoolService;
        $this->studentService = $studentService;
    }

    public function handleCreate(RegisterExamRequest $request): mixed
    {
        $data = $request->validated();
        $school = $this->schoolService->getById($data['school_id']);
        $this->studentService->handleCreateRegristationExamStudent($school, $data['total_student']);
        $data['multiple_choice_value'] = 100;
        return $this->repository->store($data);
    }
    public function handleUpdate($request, User $school, mixed $id): mixed
    {
        $data = $request->all();
        $data['multiple_choice_value'] = 100;

        if($data['total_student'] != null) {
            $this->schoolService->handleDeleteRegristationExamStudent($school);
            $this->studentService->handleCreateRegristationExamStudent($school, $data['total_student']);
        }

        $data['last_submit'] = isset($data['last_submit']) ? 1 : 0;
        $data['cheating_detector'] = isset($data['cheating_detector']) ? 1 : 0;
        return $this->repository->update($id, $data);
    }

    public function generationMentorClassroom(): mixed
    {
        $generations = auth()->user()->mentorClassrooms;
        $generationArr = [];
        foreach ($generations as $generation) {
            $generationId = $generation->classroom->generation->generation;
            array_push($generationArr, $generationId);
        }
        return $generationArr;
    }
    public function generationTeacherClassroom(): mixed
    {
        $generations = auth()->user()->teacherSchool->teacherClassrooms;
        $generationArr = [];
        foreach ($generations as $generation) {
            $generationId = $generation->classroom->generation->generation;
            array_push($generationArr, $generationId);
        }
        return $generationArr;
    }

    /**
     * handle delete task
     *
     * @param string $id
     * @return bool
     */
    public function handleDelete(string $id): bool
    {
        return $this->repository->destroy($id);
    }

    public function handleGetBySlug(string $slug): mixed
    {
        return $this->repository->getBySlug($slug);
    }
}
