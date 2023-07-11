<?php

namespace App\Services;

use App\Services\SubmitRewardService;
use App\Repositories\SubmitRewardRepository;

class SubmitRewardService
{
    private SubmitRewardRepository $repository;

    public function __construct(SubmitRewardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleCreate(Request $request): void
    {
        $data = $request->validated();
        
        $this->repository->store($data);
    }

}
?>
