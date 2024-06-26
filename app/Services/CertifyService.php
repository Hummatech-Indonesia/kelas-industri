<?php

namespace App\Services;

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
            }
        ])->where('generation_id', $classroom->generation_id)
            ->get();

        $data = $studentScores->map(function ($material) {

            $totalAssignmentCount = $material->subMaterials->sum(function ($subMaterial) {
                return $subMaterial->assignments->count();
            });

            $totalExamCount = $material->subMaterials->sum(function ($subMaterial) {
                return $subMaterial->subMaterialExams->count();
            });

            $subMaterialScores = $material->subMaterials->flatMap(function ($subMaterial) {
                return $subMaterial->subMaterialExams->flatMap(function ($subMaterialExam) {
                    return $subMaterialExam->studentSubmaterialExams->map(function ($studentSubmaterialExam) {
                        return [
                            'sub_material_exam_id' => $studentSubmaterialExam->sub_material_exam_id,
                            'score' => $studentSubmaterialExam->score,
                            'sub_material_id' => $studentSubmaterialExam->subMaterialExam->sub_material_id,
                        ];
                    });
                });
            })->groupBy('sub_material_id')
                ->map(function ($scores) {
                    return [
                        'total_score' => $scores->sum('score'),
                    ];
                });

            $assignmentScores = $material->subMaterials->flatMap(function ($subMaterial) {
                return $subMaterial->assignments->flatMap(function ($assignment) {
                    return $assignment->StudentSubmitAssignment->map(function ($studentAssignment) {
                        return [
                            'assignment_id' => $studentAssignment->assignment_id,
                            'point' => $studentAssignment->point,
                        ];
                    });
                });
            })->groupBy('assignment_id')
                ->map(function ($scores) {
                    return [
                        'total_score' => $scores->sum('point'),
                    ];
                });

            $totalExamScore = $subMaterialScores->reduce(function ($carry, $item) {
                return $carry + $item['total_score'];
            }, 0);

            $totalAssignmentScore = $assignmentScores->reduce(function ($carry, $item) {
                return $carry + $item['total_score'];
            }, 0);

            $assignmentScore = $totalAssignmentScore / $totalAssignmentCount;

            $examScore = $totalExamScore / $totalExamCount;

            $totalScore = ($examScore * 0.6) + ($assignmentScore * 0.4);

            return [
                'material' => $material->title,
                'total_score' => intval($totalScore),
            ];
        });
        return $data;
    }
}
