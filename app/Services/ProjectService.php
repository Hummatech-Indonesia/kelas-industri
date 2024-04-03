<?php

namespace App\Services;

use App\Http\Requests\ProjectRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectService
{
    private ProjectRepository $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * handleGetProjectByUser
     *
     * @param  mixed $userId
     * @return mixed
     */
    public function handleGetProjectByUser(string $userId): mixed
    {
        return $this->repository->getProjectByUser($userId);
    }

    /**
     * handleCreate
     *
     * @param  mixed $request
     * @return mixed
     */
    public function handleCreate(ProjectRequest $request): mixed
    {
        $data = $request->validated();
        $data['photo'] = $request->file('photo')->store('project_file', 'public');
        return $this->repository->create([
            'user_id' => auth()->user()->id,
            'name' => $data['name'],
            'photo' => $data['photo'],
            'description' => $data['description'],
            'deadline' => $data['deadline'],
        ]);
    }

    /**
     * handleGetProjectByClassroom
     *
     * @param  mixed $classroomId
     * @return mixed
     */
    public function handleGetProjectByClassroom(string $classroomId): mixed
    {
        return $this->repository->getProjectByClassroom($classroomId);
    }

    /**
     * handleApprovalProject
     *
     * @param  mixed $projectId
     * @return mixed
     */
    public function handleApprovalProject(string $projectId): mixed
    {
        return $this->repository->updateApprovalProject($projectId);
    }

    /**
     * handleRejectProject
     *
     * @param  mixed $projectId
     * @return mixed
     */
    public function handleRejectProject(string $projectId, Request $request): mixed
    {
        return $this->repository->updateRejectProject($projectId, $request);
    }


}
