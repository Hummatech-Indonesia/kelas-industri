<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeacherExport implements FromView
{
    protected $school;
    public function __construct($school)
    {
        $this->school = $school;
    }

    public function view(): View
    {
        return view('exports.TeacherSchool', [
            'teachers' => User::whereHas('teacherSchool', function ($q) {
                return $q->where('school_id', $this->school);
            })
            ->with('teacherSchool.teacherClassroom.classroom')
            ->whereRelation('roles', 'name', 'teacher')
            ->get()
        ]);
    }
}

