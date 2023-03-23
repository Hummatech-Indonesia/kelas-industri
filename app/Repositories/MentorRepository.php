<?php

namespace App\Repositories;

use App\Models\MentorClassroom;

class MentorRepository extends BaseRepository
{
    public function __construct(MentorClassroom $model)
    {
        $this->model = $model;
    }

    /**
     * get by mentor
     *
     * @param string $mentorId
     * @return mixed
     */
    public function get_by_mentor(string $mentorId): mixed
    {
        return $this->model->query()
            ->with(['classroom.school', 'classroom.generation.schoolYear'])
            ->where('mentor_id', $mentorId)
            ->get();
    }

    /**
     * override store function
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->updateOrCreate([
            'mentor_id' => $data['mentor_id'],
            'classroom_id' => $data['classroom_id']
        ], $data);
    }
}
