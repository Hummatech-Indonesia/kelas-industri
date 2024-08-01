<?php

namespace App\Services;

use App\Http\Requests\MaterialRequest;
use App\Repositories\MaterialExamRepository;

class MaterialExamService
{
    private $repository;

    public function __construct(MaterialExamRepository $repository)
    {
        $this->repository = $repository;
    }
    public function handleCreate(MaterialRequest $request, $material): mixed
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
        $data = [
            'material_id' => $material['id'],
            'total_multiple_choice' => $data['total_multiple_choice'],
            'total_essay' => $data['total_essay'],
            'multiple_choice_value' => $data['multiple_choice_value'],
            'essay_value' => $data['essay_value'],
            'time' => $data['time'],
            'last_submit' => isset($data['last_submit'])? $data['last_submit']: 0,
            'cheating_detector' => isset($data['cheating_detector'])? $data['cheating_detector']: 0,
        ];
        return $this->repository->store($data);
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
}
