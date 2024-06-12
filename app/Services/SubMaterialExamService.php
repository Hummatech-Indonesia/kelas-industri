<?php

namespace App\Services;

use App\Http\Requests\SubMaterialExamRequest;
use App\Repositories\SubMaterialExamRepository;

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
}
