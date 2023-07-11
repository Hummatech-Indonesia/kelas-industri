<?php

namespace App\Repositories;

use App\Models\Reward;
use App\Repositories\RewardRepository;


class RewardRepository extends  BaseRepository
{
    public function __construct(Reward $model)
    {
        $this->model = $model;
    }
}
