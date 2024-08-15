<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\StudentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class StudentController extends Controller
{
    private StudentService $service;

    public function __construct(StudentService $studentService)
    {
        $this->service = $studentService;
    }

    /**
     * getStudentByTeacher
     *
     * @param  mixed $teacher
     * @param  mixed $request
     * @return JsonResponse
     */
    public function getStudentByTeacher(User $teacher, Request $request): JsonResponse
    {
        $schoolId = $teacher->teacherSchool->school_id;
        $classroomId = $teacher->teacherSchool->teacherClassroom->classroom_id;
        $data = $this->service->handleGetStudentByClassroom($schoolId, $classroomId, false, $request);

        return response()->json([
            "message" => "Berhasil mengambil data siswa",
            "data" => $data,
        ]);
    }
}
