<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Enums\QuestionTypeEnum;
use App\Http\Requests\MaterialRequest;
use App\Repositories\MaterialRepository;
use App\Repositories\StudentMaterialExamRepository;

class MaterialService
{
    private MaterialRepository $repository;
    private StudentMaterialExamRepository $examRepository;

    public function __construct(MaterialRepository $repository, StudentMaterialExamRepository $examRepository)
    {
        $this->repository = $repository;
        $this->examRepository = $examRepository;
    }

    public function handleGetAll()
    {
        return $this->repository->getAll();
    }

    public function handleByClassroom(mixed $classroom, $request)
    {
        return $this->repository->get_by_classroom($classroom, $request->search, 6);
    }

    public function handleGetMaterialByDevision(string $devisionId, $classroomId = null)
    {
        return $this->repository->getByDevision($devisionId, $classroomId);
    }

    /**
     * handle get paginated
     *
     * @param int $schoolYearId
     * @return mixed
     */
    public function handleGetPaginate($request, int $schoolYearId): mixed
    {
        return $this->repository->get_paginate_by_school_year($request, $schoolYearId, 6);
    }

    public function handleSearch(Request $search, $year): mixed
    {
        return $this->repository->search_paginate($search->search, $search->generation_id, $search->filter, $year, 6);
    }

    /**
     * handle store
     *
     * @param MaterialRequest $request
     * @return void
     */
    public function handleCreate(MaterialRequest $request, int $order): mixed
    {
        $validate = $request->validated();
        $data = [
            'generation_id' => $validate['generation_id'],
            'title' => $validate['title'],
            'description' => $validate['description'],
            'devision_id' => $validate['devision_id'],
            'order' => $order
        ];
        return $this->repository->store($data);
    }

    /**
     * handle update
     *
     * @param MaterialRequest $request
     * @param string $id
     * @return void
     */
    public function handleUpdate(MaterialRequest $request, string $id, int $order): void
    {
        $data = $request->validated();
        $data['order'] = $order;
        $this->repository->update($id, $data);
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

    public function handleCountMaterialUser()
    {
        return $this->repository->get_count_material_user();
    }

    public function handleCountMaterialAdmin()
    {
        return $this->repository->get_count_material_admin();
    }

    public function sortDailyExamQuestion(mixed $questionBank): mixed
    {
        return $questionBank->sortBy(function ($item) {
            return $item->materialExamQuestions[0]->question_number;
        })->where('type', QuestionTypeEnum::MULTIPLECHOICE->value)->values()->all();
    }

    public function handleOrderMaterials(mixed $materials): mixed
    {
        $materialsInfo = [];

        // $prevMaterial = [];

        foreach ($materials as $material) {
            $order = $material->order;

            $previousOrder = $order - 1;
            $previousMaterial = $this->repository->handlePreviousMaterial($material->devision_id, $previousOrder);

            // $prevMaterial[] = $previousMaterial;
            // continue;
            if ($previousMaterial) {
                $complateExamPreTest = $this->examRepository->handleComplateExamPreTest($previousMaterial);
                $complateExamPosTest = $this->examRepository->handleComplateExamPosTest($previousMaterial);
            } else {
                $complateExamPreTest = true;
                $complateExamPosTest = true;
            }

            $isFirst = $order == 1;
            $materialsInfo[] = [
                'material' => $material,
                'isFirst' => $isFirst,
                'complateExamPreTest' => $complateExamPreTest,
                'complateExamPosTest' => $complateExamPosTest,
            ];
        }

        // dd($prevMaterial);

        return $data['materialsInfo'] = $materialsInfo;
    }

    public function getOrder($devisionId, $generationId): int
    {
        $latestOrder = $this->repository->getLatestOrder($devisionId, $generationId)->order ?? 0;
        return ++$latestOrder;
    }
}
