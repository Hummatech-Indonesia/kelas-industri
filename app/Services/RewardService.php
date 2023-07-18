<?php

namespace App\Services;

use App\Models\User;
use App\Models\Reward;
use Illuminate\Http\Request;
use App\Services\RewardService;
use App\Http\Requests\RewardRequest;
use App\Repositories\RewardRepository;
use Illuminate\Support\Facades\Storage;

class RewardService
{
    private RewardRepository $repository;

    public function __construct(RewardRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * handle get all
     *
     * @param array|null $order
     * @return mixed
     */
    public function handleGetAll(array $order = null): mixed
    {
        return $this->repository->getAll($order);
    }

    /**
     * handle get paginated
     *
     * @return mixed
     */
    public function handleGetPaginate(): mixed
    {
        return $this->repository->get_paginate(6);
    }

    public function handleGetAllWithSearch(string|null $search): mixed
    {
        return $this->repository->get_all_search_paginate($search, 6);
    }

    /**
     * handle search
     *
     * @param string|null $search
     * @return mixed
     */
    public function handleSearch(string|null $search): mixed
    {
        return $this->repository->search_paginate($search, 6);
    }

    public function handleCount(){
        return $this->repository->getCount();
    }

    /**
     * store school year
     *
     * @param RewardRequest $request
     * @return void
     */
    public function handleCreate(RewardRequest $request): void
    {
        $data = $request->validated();

        $data['photo'] = $request->file('photo')->store('reward_file', 'public');

        $salary = $this->repository->store($data);
    }

    /**
     * update school year
     *
     * @param RewardRequest $request
     * @param User $school
     * @return void
     */
    public function handleUpdate(RewardRequest $request, Reward $reward): void
    {
        $data = $request->validated();
        if($request->hasFile('photo')){
            Storage::delete('reward_file/' . $reward->photo);
            $data['photo'] = $request->file('photo')->store('school-logo', 'public');
        }
        $this->repository->update($reward->id, $data);
    }

    /**
     * handle delete school year
     *
     * @param User $school
     * @return bool
     */
    public function handleDelete(Reward $reward): bool
    {
        if($reward->photo){
            $delete = Storage::delete('public/' . $reward->photo);
        }
        return $this->repository->destroy($reward->id);
    }

    public function handleRewardByStudent($studentId, Request $search)
    {
        return $this->repository->get_reward_by_student($studentId,$search->search, 6);
    }
}
