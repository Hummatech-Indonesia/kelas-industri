<?php

namespace App\Exports;

use Illuminate\View\View;
use App\Models\StudentSubmaterialExam;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentRegristationExamExport implements FromView
{

    private string $schoolId;
    public function __construct(string $schoolId) {
        $this->schoolId = $schoolId;
    }
    public function view(): View
    {
        $studentExams = StudentSubmaterialExam::query()
        ->with('student')
        ->whereRelation('student.studentSchool.school', 'id', $this->schoolId)
        ->get();
        return view('exports.regristationExamStudent', compact  ('studentExams'));
    }
}
