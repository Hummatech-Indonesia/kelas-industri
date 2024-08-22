<?php

namespace App\Http\Controllers;

use App\Enums\MaterialExamTypeEnum;
use App\Services\StudentMaterialExamService;
use App\Services\UserServices;
use Illuminate\Http\Request;

class ScoreStudentController extends Controller
{
    private UserServices $userServices;
    private StudentMaterialExamService $studentMaterialExamService;
    public function __construct(UserServices $userServices, StudentMaterialExamService $studentMaterialExamService)
    {
        $this->userServices = $userServices;
        $this->studentMaterialExamService = $studentMaterialExamService;
    }

    /**
     * downloadPreTest
     *
     * @param mixed $request
     * @param mixed $materialExam
     * @param mixed $type
     * @return void
     */
    public function downloadPreTest(Request $request, mixed $materialExam, mixed $type)
    {
        $data['materialExam'] = $materialExam;
        $data['search'] = $request->search;
        $data['schools'] = $this->userServices->handleGetAllSchool();
        $data['studentSubMaterialExams'] = $this->studentMaterialExamService->halndeGetByMaterialExamPdf($request, $materialExam, $type);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('dashboard.admin.pages.materialExam.download-score-student', $data);
        return $pdf->download('Daftar-Nilai Siswa.pdf');
    }
}
