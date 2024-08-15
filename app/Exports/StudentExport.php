<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\User;
use App\Services\StudentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentExport implements FromView, ShouldAutoSize
{
    // use Exportable;
    protected $students;
    public function __construct($students) {
        $this->students = $students;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        // $students = $this->studentService->getBySchoolPaymentNotPaginate($this->school->id, $this->request);
        return view('exports.ClassroomStudent', ['students' => $this->students]);
    }
}
