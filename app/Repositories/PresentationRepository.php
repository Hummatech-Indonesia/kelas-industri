<?php

namespace App\Repositories;

use App\Models\Presentation;
use App\Repositories\BaseRepository;

class PresentationRepository extends BaseRepository
{
    public function __construct(Presentation $presentation)
    {
        $this->model = $presentation;
    }

    /**
     * getByProject
     *
     * @param  mixed $projectId
     * @return mixed
     */
    public function getByProject(string $projectId): mixed
    {
        return $this->model->query()
        ->where('project_id', $projectId)
        ->get();
    }

    public function getByProjectApproved(string $projectId): mixed
    {
        return $this->model->query()
        ->where(['project_id' => $projectId, 'status' => 'approved'])
        ->get();
    }

    /**
     * approvalPresentation
     *
     * @param  mixed $PresentationId
     * @return mixed
     */
    public function approvalPresentation(string $approvalPresentationId): mixed
    {
        return $this->show($approvalPresentationId)->update([
        'status' => 'approved',
        ]);
    }
    public function rejectPresentation(string $presentationId, mixed $pendingDate): mixed
    {
        if($pendingDate) {
            $this->updatePendingDate($presentationId, $pendingDate);
        }
        return $this->show($presentationId)->update([
        'status' => 'not_approved',
        ]);
    }

    public function updatePendingDate(string $presentationId, $pendingDate): mixed {
        return $this->show($presentationId)->update([
            'date' => $pendingDate
        ]);
    }

    public function getNearestPresentation(mixed $mentor): mixed {
        return $this->model->query()->whereRelation('project.user.studentSchool.studentClassroom', $mentor->mentorClassroom)->where('status', 'approved')->with('project.user')->orderBy('updated_at', 'desc')->limit(3)->get();
    }

}
