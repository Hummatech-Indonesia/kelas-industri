<?php

namespace App\Services;

use App\Http\Requests\NoteRequest;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\TaskRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $oldProject = $this->repository->getProjectStudent(auth()->user()->id);

        $data['photo'] = $oldProject ? $oldProject->photo : null;

        if ($request->hasFile('photo')) {

            $data['photo'] = $request->file('photo')->store('project_file', 'public');

            if ($oldProject && Storage::disk('public')->exists($oldProject->photo)) {
                Storage::disk('public')->delete($oldProject->photo);
            }
        }

        if ($oldProject && $oldProject->status === 'not_approved') {
            $oldProject->update(['status' => 'pending']);
        }

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
    public function handleGetProjectByClassroom(string $classroomId, Request $request): mixed
    {
        return $this->repository->getProjectByClassroom($classroomId, $request, 9);
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

    /**
     * handleCreateNote
     *
     * @param  mixed $request
     * @return mixed
     */
    public function handleCreateNote(NoteRequest $request): mixed
    {
        $data = $request->validated();
        return $this->repository->storeNote($data);
    }

    /**
     * handleCreateTask
     *
     * @param  mixed $request
     * @return mixed
     */
    public function handleCreateTask(TaskRequest $request): mixed
    {
        $data = $request->validated();
        return $this->repository->storeTask($data);
    }

    /**
     * handleGetNote
     *
     * @param  mixed $projectId
     * @return mixed
     */
    public function handleGetNote(string $projectId): mixed
    {
        return $this->repository->GetNoteByProject($projectId);
    }

    /**
     * handleGetTasks
     *
     * @param  mixed $projectId
     * @return mixed
     */
    public function handleGetTasks(string $projectId): mixed
    {
        return $this->repository->getTasksByProject($projectId);
    }

    /**
     * handle delete generation year
     *
     * @param string $id
     * @return bool
     */
    public function handleDeleteNote(string $id): bool
    {
        return $this->repository->destroyNote($id);
    }

    /**
     * handleUpdateNote
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function handleUpdateNote(NoteRequest $request, string $id): void
    {
        $this->repository->updateNote($id, $request->validated());
    }

    /**
     * handleUpdateTask
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function handleUpdateTask(TaskRequest $request, string $id): void
    {
        $this->repository->updateTask($id, $request->validated());
    }

    /**
     * handle delete task
     *
     * @param string $id
     * @return bool
     */
    public function handleDeleteTask(string $id): bool
    {
        return $this->repository->destroyTask($id);
    }

}
