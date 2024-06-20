<?php

namespace App\Services;

use App\Http\Requests\ExamRequest;
use App\Repositories\ClassroomRepository;
use App\Repositories\ExamRepository;

class ExamService
{
    private ExamRepository $repository;
    private ClassroomRepository $classroom;

    public function __construct(ExamRepository $repository,ClassroomRepository $classroom)
    {
        $this->repository = $repository;
        $this->classroom = $classroom;
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
        $exam = $this->repository->store($data);

        $scoreCriterias = $request->toArray();
        $classroom = $this->classroom->show($request->classroom_id);

        foreach($classroom->devision->criterias()->where('is_default',0)->get() as $criteria)
        {
            $exam->examCriterias()->create([
                'criteria_id' => $criteria->id,
                'score' => $scoreCriterias[$criteria->id]
            ]);
        }
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

        $data = $request->validated();
        $this->repository->update($id,$data);
        $exam = $this->repository->show($id);

        $scoreCriterias = $request->toArray();
        $classroom = $this->classroom->show($request->classroom_id);


        $exam->examCriterias()->delete();
        foreach($classroom->devision->criterias()->where('is_default',0)->get() as $criteria)
        {
            $exam->examCriterias()->create([
                'criteria_id' => $criteria->id,
                'score' => $scoreCriterias[$criteria->id]
            ]);
        }
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

    public function handleGetByClassroom(string $classroomId){
        return $this->repository->get_by_classroom($classroomId);
    }
}
