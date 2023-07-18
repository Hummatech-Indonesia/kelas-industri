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

    public function update_reward_valid($submitRewardId)
    {
        $this->model->findorfail($submitRewardId)->update([
            'status' => 'active',
        ]);
    }

}
