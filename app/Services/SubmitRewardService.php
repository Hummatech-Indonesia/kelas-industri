<?php

namespace App\Services;

use App\Models\User;
use App\Models\Reward;
use Illuminate\Http\Request;
use App\Services\SubmitRewardService;
use App\Http\Requests\SubmitRewardRequest;
use App\Repositories\SubmitRewardRepository;

class SubmitRewardService
{
    private SubmitRewardRepository $repository;

    public function __construct(SubmitRewardRepository $repository)
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

    public function handleCreate(Reward $reward, SubmitRewardRequest $request): void
    {
        auth()->user()->point = auth()->user()->point - $reward->point;
        auth()->user()->save();
        $rewardAmount = Reward::findOrFail($reward->id)->update([
            'amount' => $reward->amount - 1
        ]);
        $data = [
            'reward_id' => $reward->id,
            'user_id' => auth()->id(),
            'status' => 'not_active',
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ];

        $this->repository->store($data);
    }

    public function handleUpadetValid($submitRewardId) :void
    {
        $this->repository->update_reward_valid($submitRewardId);
    }

}
?>
