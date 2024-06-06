<?php

namespace App\Services;

use Illuminate\Http\Request;
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

        if ($event->limit_participant - count($event->participants) == 0 && $event->limit_participant != null) {
            return 'limit';
        }
        $data = [
            'event_id' => $event->id,
            'user_id' => $userId
        ];
        return $this->repository->store($data);
    }

    public function checkFollowing(mixed $event, string $userId): mixed
    {
        $data = [];
        if ($data['following'] = $this->repository->checkFollowing($event, $userId)) {
            $data['certificate'] = $data['following']->get_cetificate == true;
            return $data;
        } else {
            return false;
        }
    }

    public function handleSetCertificate(Request $request, $participantId): void
    {
        foreach ($request->id as $id) {
            $this->repository->update($id, ['get_cetificate' => true]);
        }
    }

    public function handleDelete($eventId, $userId): mixed
    {
        return $this->repository->delete($eventId, $userId);
    }
}
