<?php
namespace App\Repositories;

use App\Models\EventDocumentation;
use App\Repositories\BaseRepository;

class EventDocumentationRepository extends BaseRepository
 {
    public function __construct(EventDocumentation $model) {
        $this->model = $model;
    }

 }
