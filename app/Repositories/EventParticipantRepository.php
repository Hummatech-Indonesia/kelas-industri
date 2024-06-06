<?php

namespace App\Repositories;

use App\Models\EventPartisipant;
use App\Repositories\BaseRepository;

class EventParticipantRepository extends BaseRepository
{
    public function __construct(EventPartisipant $model)
    {
        $this->model = $model;
    }
    public function checkFollowing(int $eventId, $userId): mixed
    {
        return $this->model->query()
            ->where('event_id', $eventId)
            ->where('user_id', $userId)
            ->first();
    }

    public function setCertificate($participantId): void
    {
        $this->model->findOrFail($participantId)->update(['get_cetificate' => 1]);
    }

    public function delete(int $eventId, $userId): mixed
    {
        return $this->model->query()
        ->where('user_id', $userId)
        ->where('event_id', $eventId)
        ->first()
        ->delete();
    }
}
