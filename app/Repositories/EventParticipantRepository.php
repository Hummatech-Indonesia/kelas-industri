<?php
namespace App\Repositories;
use App\Models\EventPartisipant;
use App\Repositories\BaseRepository;

class EventParticipantRepository extends BaseRepository
 {
    public function __construct(EventPartisipant $model) {
        $this->model = $model;
    }
 }
