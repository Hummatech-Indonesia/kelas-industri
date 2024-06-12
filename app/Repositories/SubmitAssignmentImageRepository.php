<?php

namespace App\Repositories;

use App\Models\SubmitAssignmentImage;

class SubmitAssignmentImageRepository extends BaseRepository {
    public function __construct(SubmitAssignmentImage $model) {
        $this->model = $model;
    }
}
