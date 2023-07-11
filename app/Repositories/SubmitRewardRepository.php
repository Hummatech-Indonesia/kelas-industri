<?php

namespace App\Repositories;


use App\Models\SubmitReward;
use App\Repositories\SubmitRewardRepository;

class SubmitRewardRepository extends BaseRepository
{
    public function __construct(SubmitReward $model)
    {
        $this->model = $model;
    }

}
