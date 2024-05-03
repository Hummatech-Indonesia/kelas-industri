<?php

namespace App\Services;

use App\Models\PresentationFinish;
use App\Repositories\PresentationFinishRepository;

class PresentationFinishService {
    private PresentationFinishRepository $repository;

    public function __construct(PresentationFinishRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getPresentationFinish($projectId) : mixed {
        return $this->repository->handleGetFinishPresentation($projectId);
    }

    public function setPresentationFinish(string $projectId) : mixed {
        return $this->repository->handleFinishPresentation($projectId);
    }
}
