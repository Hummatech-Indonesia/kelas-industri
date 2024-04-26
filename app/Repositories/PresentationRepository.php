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

}
