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
        // Retrieve the data using the service
        $studentSubmaterialExams = $this->repository->getAllStudentSubmit($submaterialExamId);

        // Group the data by classroom name via related studentSchool
        $topClassroom = $studentSubmaterialExams
            ->load('student.studentSchool.studentClassroom.classroom')
            ->groupBy(function ($item) {
                return $item->student->studentSchool->studentClassroom->classroom->name;
            });

        // Calculate the average score for each group and include related data
        $averages = $topClassroom->map(function ($group) {
            $averageScore = $group->avg('score'); // Replace 'score' with the actual column name you want to average
            $sampleItem = $group->first(); // Get a sample item from the group to access related data

            // Ensure sampleItem and related studentSchool exist
            if ($sampleItem && $sampleItem->student && $sampleItem->student->studentSchool) {
                $schoolData = $sampleItem->student->studentSchool->school->only(['name']); // Replace with actual attributes you need
            } else {
                $schoolData = [];
            }

            return [
                'average_score' => $averageScore,
                'school' => $schoolData
            ];
        });

        // Sort the averages in descending order and take the top 5
        $sortedAverages = $averages->sortByDesc('average_score')->take(5);

        // Return the data or pass it to a view
        return $sortedAverages;
    }
}
