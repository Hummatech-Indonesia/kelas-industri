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
}
