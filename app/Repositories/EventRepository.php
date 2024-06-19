<?php

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\BaseRepository;

class EventRepository extends BaseRepository
{
    private Event $event;

    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    public function getNotStarted()
    {
        return $this->model->query()->where('start_date', '>', now())->get();
    }

    public function getNewer() {
        return $this->model->query()->orderBy('start_date', 'desc')->get();
    }

    public function get_with_participant_paginate(int $limit, $search): mixed
    {
        return $this->model->query()
            ->withCount('participants')
            ->where('title', 'LIKE', '%' . $search . '%')
            ->paginate($limit);
    }
}
