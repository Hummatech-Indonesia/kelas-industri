<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Repositories\NotificationRepository;

class NotificationService {
    private NotificationRepository $repository;

    public function __construct(NotificationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * handleCreate
     *
     * @param  mixed $request
     * @return mixed
     */

    public function createRejectNotification(string $projectId, Request $request): mixed {
        $data['project_id'] = $projectId;
        $data['message'] = $request->message;

        return $this->repository->store($data);
    }

    /**
     * handleCreate
     *
     * @param  mixed $request
     * @return mixed
     */
    public function getNotification() : mixed {
        return $this->repository->getUserNotification();
    }
}
