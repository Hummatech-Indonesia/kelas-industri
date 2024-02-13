<?php

namespace App\Repositories;

use App\Models\Classroom;
use App\Models\Generation;
use App\Models\MentorClassroom;
use App\Models\StudentClassroom;
use App\Models\TeacherClassroom;

class ClassroomRepository extends BaseRepository
{

    private StudentClassroom $studentClassroom;

    public function __construct(Classroom $model, StudentClassroom $studentClassroom, MentorClassroom $mentorClassroom, TeacherClassroom $teacherClassroom, Generation $generation)
    {
        $this->model = $model;
        $this->studentClassroom = $studentClassroom;
        $this->mentorClassroom = $mentorClassroom;
        $this->teacherClassroom = $teacherClassroom;
        $this->generation = $generation;
    }

    public function get_by_mentor_jurnal(string $mentorId)
    {
        return $this->mentorClassroom->query()
            ->where('mentor_id', $mentorId)
            ->get();
    }

    public function get_by_teacher_jurnal(string $teacherId)
    {
        return $this->teacherClassroom->query()
            ->whereRelation('teacherSchool', function ($q) use ($teacherId) {
                $q->where('teacher_id', $teacherId);
            })
            ->get();
    }

    public function get_by_student_jurnal(string $studentId)
    {
        return $this->studentClassroom->query()
            ->whereRelation('studentSchool', function ($q) use ($studentId) {
                $q->where('student_id', $studentId);
            })
            ->get();
    }

    public function get_by_teacher_create_edit(string $teacherId): mixed
    {
        return $this->teacherClassroom->query()
            ->whereRelation('teacherSchool', function ($q) use ($teacherId) {
                $q->where('teacher_id', $teacherId);
            })
            ->get();
    }

    public function get_by_mentor_create_edit(string $mentorId): mixed
    {
        return $this->mentorClassroom->query()
            ->where('mentor_id', $mentorId)
            ->get();
    }

    public function get_by_mentor(string $mentorId, string | null $search, int $limit)
    {
        return $this->mentorClassroom->query()
            ->where('mentor_id', $mentorId)
            ->whereRelation('classroom', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->paginate($limit);
    }

    public function get_by_teacher(string $teacherId, string | null $search, int $limit)
    {
        return $this->teacherClassroom->query()
            ->whereRelation('teacherSchool', function ($q) use ($teacherId) {
                $q->where('teacher_id', $teacherId);
            })
            ->whereRelation('classroom', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->paginate($limit);
    }

    public function get_by_student(string $studentId, string | null $search, int $limit)
    {
        return $this->studentClassroom->query()
            ->whereRelation('studentSchool', function ($q) use ($studentId) {
                $q->where('student_id', $studentId);
            })
            ->whereRelation('classroom', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->paginate($limit);
    }

    /**
     * Handle the Get all data event from models.
     *
     *
     * @param string $schoolId
     * @param int $schoolYearId
     * @return mixed
     */

    public function get_by_school(string $schoolId, int $schoolYearId): mixed
    {
        return $this->model->query()
            ->where('school_id', $schoolId)
            ->whereRelation('generation', function ($q) use ($schoolYearId) {
                return $q->where('school_year_id', $schoolYearId);
            })
            ->get();
    }

    public function get_teacher_classroom(string $schoolId, int $schoolYearId): mixed
    {
        $classroomId = TeacherClassroom::pluck('classroom_id')->toArray();
        return $this->model->query()
            ->whereRelation('generation', function ($q) use ($schoolYearId) {
                return $q->where('school_year_id', $schoolYearId);
            })
            ->where('school_id', $schoolId)
            ->whereNotIn('id', $classroomId)
            ->get();
    }

    /**
     * get_paginate_by_school
     *
     * @param string $schoolId
     * @param int $limit
     * @return mixed
     */
    public function get_paginate_by_school(string $schoolId, int $schoolYearId, int $limit): mixed
    {
        return $this->model->query()
            ->where('school_id', $schoolId)
            ->whereRelation('generation', function ($q) use ($schoolYearId) {
                return $q->where('school_year_id', $schoolYearId);
            })
            ->paginate($limit);
    }

    /**
     * get_paginate_by_school_search
     *
     * @param string $search
     * @param string $schoolId
     * @param int $limit
     * @return mixed
     */
    public function get_paginate_by_school_search(string | null $search,string|null $generation,string|null $filter, string $schoolId, int $limit): mixed
    {
        return $this->model->query()
            ->where('name', 'like', '%' . $search . '%')
            ->when($generation,function($q) use ($generation){
                return $q->where('generation_id',$generation);
            })
            ->when($filter,function($q) use ($filter){
                $q->whereRelation('generation', function ($q) use ($filter){
                    return $q->where('school_year_id',$filter);
                });
            })
            ->orderBy('name', 'ASC')
            ->where('school_id', $schoolId)
            ->paginate($limit);
    }

    public function get_count_classroom_teacher(string $teacherId): mixed
    {
        return $this->teacherClassroom->query()
            ->whereRelation('teacherSchool', function ($q) use ($teacherId) {
                $q->where('teacher_id', $teacherId);
            })
            ->count();
    }

    public function get_count_classroom_mentor(string $mentorId): mixed
    {
        return $this->mentorClassroom->query()
            ->where('mentor_id', $mentorId)
            ->count();
    }

    public function get_school_classroom(string $schoolId): mixed
    {
        return $this->model->query()
            ->where('school_id', $schoolId)
            ->get();
    }

    public function get_school_classroom_report(string $schoolId, $year):mixed
    {
        return $this->model->query()
            ->where('school_id', $schoolId)
            ->whereRelation('generation.schoolYear', function ($q) use ($year){
                $q->where('id', $year);
            })
            ->get();
    }

    public function get_school_classroom_mentor(string $mentorId, $year):mixed
    {
        return $this->mentorClassroom->query()
                    ->where('mentor_id', $mentorId)
                    ->whereRelation('classroom.generation.schoolYear', function ($q) use ($year){
                        $q->where('id', $year);
                    })
                    ->get();
    }

    public function get_school_classroom_teacher(string $teacherId,string $schoolId, $year):mixed
    {
        return $this->teacherClassroom->query()
                    ->whereRelation('teacherSchool', function ($q) use ($teacherId){
                        $q->where('teacher_id', $teacherId);
                    })
                    ->whereRelation('teacherSchool', function ($q) use ($schoolId){
                        $q->where('school_id', $schoolId);
                    })
                    ->whereRelation('classroom.generation.schoolYear', function ($q) use ($year){
                        $q->where('id', $year);
                    })
                    ->get();
    }

    public function get_school_classroom_journal(string $schoolId,$year) :mixed
    {
        return $this->model->query()
        ->whereRelation('generation.schoolYear', function ($q) use ($year){
            $q->where('id', $year);
        })
        ->where('school_id', $schoolId)
        ->get();
    }

    public function get_student_by_classroom(string $classroomId){
        return $this->studentClassroom->query()
        ->where('classroom_id', $classroomId)
        ->get();
    }
}
