<?php

namespace App\Exports;

use App\Models\Student;
use App\Services\StudentService;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentExport implements FromCollection
{
    use Exportable;
    private StudentService $studentService;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return view('dashboard.finance.pages.trackingPayment.excel', ['']);
    }
}
