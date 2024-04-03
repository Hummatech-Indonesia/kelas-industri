<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectRepository extends BaseRepository
{
    public function __construct(Project $project)
    {
        $this->model = $project;
    }

    public function getProjectByUser(string $userId): mixed
    {
        return $this->model->query()
            ->where('user_id', $userId)
            ->first();
    }

    /**
     * create
     *
     * @param  mixed $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->model->query()
            ->updateOrCreate([
                'user_id' => auth()->user()->id,
            ], $data);
    }

    /**
     * getProjectByClassroom
     *
     * @param  mixed $classroomId
     * @return mixed
     */
    public function getProjectByClassroom(string $classroomId): mixed
    {
        return $this->model->query()
            ->whereRelation('user.studentSchool.studentClassroom', 'classroom_id', $classroomId)
            ->get();
    }

    /**
     * updateApprovalProject
     *
     * @param  mixed $projectId
     * @return mixed
     */
    public function updateApprovalProject(string $projectId): mixed
    {
        return $this->show($projectId)->update([
            'status' => 'approved',
            'start' => now(),
        ]);
    }

    /**
     * updateRejectProject
     *
     * @param  mixed $projectId
     * @return mixed
     */
    public function updateRejectProject(string $projectId, Request $request): mixed
    {
        return $this->show($projectId)->update([
            'status' => 'not_approved',
            'message' => $request->message,
        ]);
    }
}
