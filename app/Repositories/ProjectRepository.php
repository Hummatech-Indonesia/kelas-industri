<?php

namespace App\Repositories;

use App\Models\Note;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectRepository extends BaseRepository
{
    public function __construct(Project $project, Note $note, Task $task)
    {
        $this->model = $project;
        $this->note = $note;
        $this->task = $task;
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
    public function getProjectByClassroom(string $classroomId, Request $request, int $limit): mixed
    {
        return $this->model->query()
            ->when($request->status, function ($q) use ($request) {
                return $q->where('status', $request->status);
            })
            ->where('name', 'like', '%' . $request->search . '%')
            ->whereRelation('user.studentSchool.studentClassroom', 'classroom_id', $classroomId)
            ->paginate($limit);
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
            'type' => 'project'
        ]);
    }

    /**
     * getProjectStudent
     *
     * @param  mixed $studentId
     * @return mixed
     */
    public function getProjectStudent(string $studentId): mixed
    {
        return $this->model->query()
            ->where('user_id', $studentId)
            ->first();
    }

    /**
     * storeNote
     *
     * @param  mixed $data
     * @return mixed
     */
    public function storeNote(array $data): mixed
    {
        $values = [];

        foreach ($data['description'] as $subArray) {
            $values = array_merge($values, $subArray);
        }

        $new = implode(",", $values);

        $data['description'] = $new;

        return $this->note->create($data);
    }

    public function getNoteByProject(string $projectId): mixed
    {
        return $this->note->query()
            ->where('project_id', $projectId)
            ->get();
    }

    /**
     * Handle show method and delete data instantly from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */

    /**
     * destroy
     *
     * @param  mixed $id
     * @return mixed
     */
    public function destroyNote(mixed $id): mixed
    {
        $destroy = $this->note->find($id);

        try {
            $destroy = $destroy->delete($id);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                return false;
            }
        }

        return $destroy;
    }

    /**
     * destroyTask
     *
     * @param  mixed $id
     * @return mixed
     */
    public function destroyTask(mixed $id): mixed
    {
        $destroy = $this->task->find($id);

        try {
            $destroy = $destroy->delete($id);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                return false;
            }
        }

        return $destroy;
    }

    /**
     * updateTask
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function updateTask(mixed $id, array $data): mixed
    {
        return $this->task->findOrFail($id)->update($data);
    }

    /**
     * updateNote
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function updateNote(mixed $id, array $data): mixed
    {
        $new = implode(",", $data['description']);
        $data['description'] = $new;

        return $this->note->findOrFail($id)->update($data);
    }

    /**
     * storeTask
     *
     * @param  mixed $data
     * @return mixed
     */
    public function storeTask(array $data): mixed
    {
        return $this->task->create($data);
    }

    /**
     * getTasksByProject
     *
     * @param  mixed $projectId
     * @return mixed
     */
    public function getTasksByProject(string $projectId): mixed
    {
        return $this->task->query()
            ->where('project_id', $projectId)
            ->get();
    }
}
