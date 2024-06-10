<?php

namespace App\Services;

use App\Http\Requests\EventRequest;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\Storage;

class EventService
{
    private EventRepository $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleShow($id): mixed
    {
        return $this->repository->show($id);
    }

    public function handleCreate(EventRequest $request): mixed
    {
        $data = $request->validated();

        $data['photo'] = $request->file('photo')->store('event', 'public');
        $data['thumnail'] = $request->file('thumnail')->store('event', 'public');
        return $this->repository->store($data);
    }
    public function handleUpdate($event, EventRequest $request): mixed
    {
        $data = $request->validated();
        // dd($data);
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('event', 'public');
            $delete = Storage::delete('public/' . $event->photo);
        }
        if ($request->hasFile('thumnail')) {
            $data['thumnail'] = $request->file('thumnail')->store('event', 'public');
            $delete = Storage::delete('public/' . $event->thumnail);
        }
        return $this->repository->update($event->id, $data);
    }
    public function handleGetNotStarted(): mixed
    {
        return $this->repository->getNotStarted();
    }
    public function handleDelete($event): mixed
    {
        if ($event->photo) {
            $delete = Storage::delete('public/' . $event->photo);
        }
        if ($event->thumnail) {
            $delete = Storage::delete('public/' . $event->thumnail);
        }
        return $this->repository->destroy($event->id);
    }
    public function handleGetPaginate(int $paginate, $search): mixed
    {
        return $this->repository->get_with_participant_paginate($paginate, null,  $search);
    }
}
