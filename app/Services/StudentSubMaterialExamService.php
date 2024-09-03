<?php

namespace App\Services;

use App\Repositories\StudentSubmaterialExamRepository;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class StudentSubMaterialExamService
{
    private StudentSubmaterialExamRepository $repository;

    public function __construct(StudentSubmaterialExamRepository $repository)
    {
        $this->repository = $repository;
    }

    public function checkRemedial($submaterialExamId): mixed
    {
        $studentExam = $this->repository->get_user_submaterial_exam($submaterialExamId);

        if ($studentExam->finished_count >= 3) {
            return 'limit';
        } elseif ($studentExam->score < 75) {
            return 'remedial';
        } else {
            return 'passed';
        }
    }

    public function halndeGetBySubmaterialExam(Request $request, $submaterialExamId): mixed
    {
        return $this->repository->getBySubmaterialExam($request, $submaterialExamId, 10);
    }

    public function handleGetAllStudentSubmit($submaterialExamId)
    {
        $studentSubmaterialExams = $this->repository->getAllStudentSubmit($submaterialExamId);

        $topClassroom = $studentSubmaterialExams
            ->load('student.studentSchool.studentClassroom.classroom')
            ->groupBy(function ($item) {
                return $item->student->studentSchool->studentClassroom->classroom->name;
            });
        $averages = $topClassroom->map(function ($group) {
            $averageScore = $group->avg('score');
            $sampleItem = $group->first();

            if ($sampleItem && $sampleItem->student && $sampleItem->student->studentSchool) {
                $schoolData = $sampleItem->student->studentSchool->school->only(['name']);
                // $schoolData = [];
            }

            return [
                'average_score' => $averageScore,
                'school' => $schoolData
            ];
        });

        $sortedAverages = $averages->sortByDesc('average_score')->take(5);

        return $sortedAverages;
    }


    public function handleGetTester($schoolId) : mixed {
        return $this->repository->getTester($schoolId);
    }
}
