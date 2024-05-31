<?php

namespace App\Services;

use App\Repositories\EventParticipantRepository;


class EventParticipantService
{
    private EventParticipantRepository $repository;

    public function __construct(EventParticipantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleCreate($event, $userId): mixed
    {

        if ($event->limit_participant - count($event->participants) == 0) {
            return 'limit';
        }
        $data = [
            'event_id' => $event->id,
            'user_id' => $userId
        ];
        return $this->repository->store($data);
    }
}
