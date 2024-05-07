<?php

namespace App\Repositories;

use App\Models\Reward;
use App\Models\SubmitReward;


class RewardRepository extends  BaseRepository
{
    private SubmitReward $submitReward;
    
    public function __construct(Reward $model, SubmitReward $submitReward)
    {
        $this->model = $model;
        $this->submitReward = $submitReward;
    }

    /**
     * search paginate
     *
     * @param string|null $search
     * @param int $limit
     * @return mixed
     */
    public function search_paginate(string|null $search, int $limit): mixed
    {
        return $this->model->query()
            ->where('reward_name', 'like', '%'. $search .'%')
            ->paginate($limit);
    }

    public function get_reward_by_student($studentId, string | null $search, int $limit)
    {
        return $this->submitReward->query()
        ->whereRelation('reward', function ($q) use ($search) {
            $q->where('reward_id', 'like', '%' . $search . '%');
        })
            ->where('user_id', $studentId)
            ->paginate($limit);
    }
}
