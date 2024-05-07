<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Services\RewardService;
use App\Http\Requests\RewardRequest;

class RewardController extends Controller
{
    use DataSidebar;
    private RewardService $rewardService;

    public function __construct(RewardService $rewardService){
        $this->rewardService = $rewardService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            $data = [
                'rewards' => $this->rewardService->handleGetAll()
            ];
            return view('dashboard.admin.pages.reward.index', $data);
        }else{
            $data = $this->GetDataSidebar();
            $reward = $this->rewardService->handleGetPaginate();
            $parameters = null;

            if (request()->has('search')) {
                $reward = $this->rewardService->handleSearch(request()->search);
                $parameters = request()->query();
        }
            $data['rewards'] = $reward;
            $data['parameters'] = $parameters;
            return view('dashboard.user.pages.reward.index', $data);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.admin.pages.reward.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\RewardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RewardRequest $request)
    {
        $this->rewardService->handleCreate($request);

        return to_route('admin.rewards.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reward $reward)
    {
        $data = [
            'reward' => $reward
        ];
        return view('dashboard.admin.pages.reward.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RewardRequest $request, Reward $reward)
    {
        $this->rewardService->handleUpdate($request, $reward);
        return to_route('admin.rewards.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reward $reward)
    {
        $data = $this->rewardService->handleDelete($reward);

        if (!$data) {
            return back()->with('error', trans('alert.delete_constrained'));
        }

        return back()->with('success', trans('alert.delete_success'));
    }

    public function historyReward(Request $request)
    {
        $data = $this->GetDataSidebar();
        $data['search'] = $request->search;
        $data['rewards'] = $this->rewardService->handleRewardByStudent(auth()->id(), $request);
        return view('dashboard.user.pages.reward.detail', $data);
    }


}
