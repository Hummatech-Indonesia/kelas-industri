<?php

namespace App\Services;

use App\Http\Requests\SubMaterialExamRequest;
use App\Models\StudentSubmaterialExam;
use App\Repositories\SubMaterialExamRepository;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class SubMaterialExamService
{
    private SubMaterialExamRepository $repository;

    public function __construct(SubMaterialExamRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleCreate(SubMaterialExamRequest $request): mixed
    {
        $data = $request->validated();
        if ($data['total_essay'] == 0) {
            if ($data['essay_value'] != 0) {
                return redirect()->back()->with('error', 'Jika total essay nya 0, bobot nilai essay nya harus 0 juga');
            }
        }
        if ($data['multiple_choice_value'] + $data['essay_value'] != 100) {
            return redirect()->back()->with('error', 'Total bobot nilai harus 100');
        }
        return $this->repository->store($data);
    }
    public function handleUpdate(SubMaterialExamRequest $request, mixed $id): mixed
    {
        $data = $request->validated();
        if ($data['total_essay'] == 0) {
            if ($data['essay_value'] != 0) {
                return redirect()->back()->with('error', 'Jika total essay nya 0, bobot nilai essay nya harus 0 juga');
            }
        }
        if ($data['multiple_choice_value'] + $data['essay_value'] != 100) {
            return redirect()->back()->with('error', 'Total bobot nilai harus 100');
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
