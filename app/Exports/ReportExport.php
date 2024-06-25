<?php

namespace App\Exports;

use App\Models\Exam;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    protected $exam;
    protected $semester;

    public function __construct($exam, $semester)
    {
        $this->exam = $exam;
        $this->semester = $semester;
    }

    public function view(): View
    {
        return view('exports.exam', [
            'exams' => Exam::where('exam_type', $this->exam)->where('semester', $this->semester)
            ->get()
        ]);
    }
}
