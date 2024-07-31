<?php

namespace App\Services;

use App\Enums\MaterialExamTypeEnum;
use App\Models\Material;

class CertifyService
{
    public function studentScore($classroom): mixed
    {
        $studentScores = Material::with([
            'subMaterials.subMaterialExams.studentSubmaterialExams' => function ($query) {
                $query->where('student_id', auth()->user()->id)
                    ->select('sub_material_exam_id', 'score');
            },
            'subMaterials.assignments.StudentSubmitAssignment' => function ($query) {
                $query->where('student_id', auth()->user()->id)
                    ->select('assignment_id', 'point');
            },
        ])
        ->with('materialExam.studentMaterialExams', function($query) {
            $query->where('student_id', auth()->user()->id)
            ->where('type', MaterialExamTypeEnum::POSTEST->value);
        })
        ->where('generation_id', $classroom->generation_id)
        ->get();

        $data = $studentScores->map(function ($material) {
            $totalAssignmentCount = $material->subMaterials->sum(fn($subMaterial) => $subMaterial->assignments->count());
            $totalExamCount = $material->subMaterials->sum(fn($subMaterial) => $subMaterial->subMaterialExams->count());
            $totalMaterialExamCount = $material->materialExam->studentMaterialExams->count();

            $subMaterialScores = $material->subMaterials->flatMap(function ($subMaterial) {
                return $subMaterial->subMaterialExams->flatMap(function ($subMaterialExam) {
                    return $subMaterialExam->studentSubmaterialExams->map(fn($studentSubmaterialExam) => [
                        'sub_material_exam_id' => $studentSubmaterialExam->sub_material_exam_id,
                        'score' => $studentSubmaterialExam->score,
                        'sub_material_id' => $studentSubmaterialExam->subMaterialExam->sub_material_id,
                    ]);
                });
            })->groupBy('sub_material_id')->map(fn($scores) => [
                'total_score' => $scores->sum('score'),
            ]);

            $assignmentScores = $material->subMaterials->flatMap(function ($subMaterial) {
                return $subMaterial->assignments->flatMap(function ($assignment) {
                    return $assignment->StudentSubmitAssignment->map(fn($studentAssignment) => [
                        'assignment_id' => $studentAssignment->assignment_id,
                        'point' => $studentAssignment->point,
                    ]);
                });
            })->groupBy('assignment_id')->map(fn($scores) => [
                'total_score' => $scores->sum('point'),
            ]);

            $totalExamScore = $subMaterialScores->sum('total_score');
            $totalAssignmentScore = $assignmentScores->sum('total_score');

            $postTestScore = $material->materialExam->studentMaterialExams->sum('score');

            $assignmentScore = $totalAssignmentScore / max($totalAssignmentCount, 1);
            $examScore = $postTestScore / max($totalMaterialExamCount, 1);

            $totalScore = ($examScore * 0.6) + ($assignmentScore * 0.4);

            return [
                'material' => $material->title,
                'total_score' => intval($totalScore),
            ];
        });
        return $data;
    }
}
