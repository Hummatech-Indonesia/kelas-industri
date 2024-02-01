<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Assignment;
use App\Models\StudentClassroom;
use App\Models\SubmitAssignment;
use Illuminate\Support\Facades\Storage;

class AssignmentRepository extends BaseRepository
{
    private StudentClassroom $studentClassroom;
    private User $student;
    private SubmitAssignment $submitAssignment;

    public function __construct(Assignment $assignment, StudentClassroom $studentClassroom, User $student, SubmitAssignment $submitAssignment)
    {
        $this->model = $assignment;
        $this->studentClassroom = $studentClassroom;
        $this->student = $student;
        $this->submitAssignment = $submitAssignment;
    }

    public function get_by_submaterial(string $submaterialId)
    {
        return $this->model->query()
            ->where('sub_material_id', $submaterialId)
            ->get();
    }

    public function get_assignment_student(string $classroomId, string $assignmentId): mixed
    {
        return $this->student->query()
            ->with('submitAssignment', function ($q) use ($assignmentId) {
                $q->where('assignment_id', $assignmentId);
            })
            ->whereRelation('studentSchool.classrooms', function ($q) use ($classroomId) {
                $q->where('classroom_id', $classroomId);
            })
//            ->withCount(['submitAssignment' => function ($q) use ($assignmentId) {
//                $q->where('assignment_id', $assignmentId);
//            }])
            ->get();
    }

    public function getSubmitAssignmentByStudentId($studentId)
{
    return $this->submitAssignment->where('student_id', $studentId)->first();
}


    public function get_submit_assignment_student(string $studentId, string $assignmentId): mixed
    {
        return $this->submitAssignment->query()
            ->where(['assignment_id' => $assignmentId, 'student_id' => $studentId])
            ->first();
    }

    public function create_submit_assignment(array $data, string $studentId): void
    {

    $oldFile = $this->submitAssignment->where('student_id', $studentId)->first();
    if ($oldFile) {
        Storage::disk('public')->delete($oldFile->file);
    }
    $this->submitAssignment->updateOrCreate(
        ['student_id' => $studentId, 'assignment_id' => $data['assignment_id']], $data);
    }

    public function get_student_done_submit(string $assignmentId)
    {
        return $this->submitAssignment->query()
            ->where('assignment_id',$assignmentId)
            ->whereNotNull('point')
            ->pluck('student_id')
            ->toArray();
    }

    public function storePoint(int $id , int $point):void
    {
        $data = $this->submitAssignment->query()
            ->findorfail($id);
        $data->point = $point;
        $data->save();
    }

    public function showSubmitAssignment($id){
        return $this->submitAssignment->query()
            ->findOrFail($id);
    }

    public function get_count_assignment_student()
    {
        $generationId = Auth()->user()->studentSchool->studentClassroom->classroom->generation_id;
        return $this->model->query()
        ->whereIn('sub_material_id', function ($query) use ($generationId) {
        $query->select('id')
            ->from('sub_materials')
            ->whereIn('material_id', function ($query) use ($generationId) {
                $query->select('id')
                    ->from('materials')
                    ->whereIn('generation_id', function ($query) use ($generationId) {
                        $query->select('id')
                            ->from('generations')
                            ->where('id', $generationId);
                    });
            });
        })->count();
    }

    /**
     * count_assignments
     *
     * @param  mixed $previousOrder
     * @return int
     */
    public function count_assignments(int $previousOrder): int
    {
        return $this->model->query()
        ->whereRelation('submaterial', 'order', $previousOrder)
        ->count();
    }

    /**
     * count_student_assignments
     *
     * @param  mixed $previousOrder
     * @return int
     */
    public function count_student_assignments(int $previousOrder): int
    {
        return $this->model->query()
        ->whereRelation('submaterial', 'order', $previousOrder)
        ->whereHas('StudentSubmitAssignment', function ($query) {
            $query->where('student_id', auth()->user()->studentSchool->student_id);
        })
        ->count();
    }

    /**
     * count_assignment_materials
     *
     * @param  mixed $submaterial
     * @return int
     */
    public function count_assignment_materials(string $submaterial): int
    {
        return $this->model->query()
        ->where('sub_material_id', $submaterial)
        ->count();
    }


}
