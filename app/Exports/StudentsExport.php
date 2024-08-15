<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    protected $classroomStudents;
    public function __construct($classroomStudents)
    {
        $this->classroomStudents = $classroomStudents;
    }

    public function view(): View
    {
        return view('exports.regristationExamUser', [
            'users' => User::whereHas('students', function ($q) {
                return $q->where('school_id', $this->school->id);
            })
            ->whereRelation('roles', 'name', 'tester')
            ->get()
        ]);
    }
}
