<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\EventDocumentationRepository;


class EventDocumentationService
{
    private EventDocumentationRepository $repository;

    public function __construct(EventDocumentationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleCreate(Request $request): mixed
    {
        $data = $request->all();
        $data['media'] = $request->file('photo')->store('event', 'public');
        return $this->repository->store($data);
    }
    public function handleCreateMultiple(Request $request, $eventId): mixed
    {
        $data['event_id'] = $eventId;
        $data['media'] = $request->file('file')->store('event', 'public');
        return $this->repository->store($data);
    }

    public function handleDelete($documentation): mixed
    {
        if ($documentation->media) {
            $delete = Storage::delete('public/' . $documentation->media);
        }
        return $this->repository->destroy($documentation->id);
    }
}
