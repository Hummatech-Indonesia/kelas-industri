<?php

namespace App\Repositories;

use App\Models\Schedule;

class ScheduleRepository extends BaseRepository {
    public function __construct(Schedule $schedule) {
        $this->model = $schedule;
    }

    public function all() {
        return $this->model->all();
    }

    public function delete(int $id) {
        return $this->model->findOrFail($id)->delete();
    }
}
