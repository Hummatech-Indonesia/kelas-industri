<?php

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\BaseRepository;

class EventRepository extends BaseRepository
{
    private Event $event;

    public function __construct(Event $model) {
        $this->model = $model;
    }

    public function getNotStarted() {
        return $this->model->query()->where('start_date', '>', now())->get();
    }
}
