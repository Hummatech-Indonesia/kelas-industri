<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\ExamService;
use App\Http\Requests\ExamRequest;
use App\Repositories\ExamRepository;

class ExamService
{
    private ExamRepository $repository;

    public function __construct(ExamRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * handle store
     *
     * @param ExamRequest $request
     * @return void
     */
    public function handleCreate(ExamRequest $request): void
    {
        $data = $request->validated();
        $data['student_classroom_id'] = $request->student_classroom_id;
        $data['exam_type'] = $request->exam_type;
        $data['task_level'] = $request->task_level;
        $data['complexity'] = $request->complexity;
        $data['code_cleanliness'] = $request->code_cleanliness;
        $data['design'] = $request->design;
        $data['presentation'] = $request->presentation;
        $data['understanding'] = $request->understanding;
        $this->repository->store($data);
    }

    /**
     * handle update
     *
     * @param ExamRequest $request
     * @param string $id
     * @return void
     */
    public function handleUpdate(ExamRequest $request, string $id): void
    {
        $this->repository->update($id, $request->validated());
    }

    /**
     * handle delete
     *
     * @param string $id
     * @return bool
     */
    public function handleDelete(string $id): bool
    {
        return $this->repository->destroy($id);
    }

    public function handleGetStudentByExamUTS(string $classroomId)
    {
        return $this->repository->get_student_by_exam_uts($classroomId);
    }

    public function handleGetStudentByExamUAS(string $classroomId)
    {
        return $this->repository->get_student_by_exam_uas($classroomId);
    }
}
