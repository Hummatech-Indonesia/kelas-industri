<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\SubmitReward;
use Illuminate\Http\Request;
use App\Services\SubmitRewardService;
use App\Http\Requests\SubmitRewardRequest;

class SubmitRewardController extends Controller
{

    private SubmitRewardService $service;

    public function __construct(SubmitRewardService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  [
            'submitRewards' => $this->service->handleGetAll()
        ];
        return view('dashboard.admin.pages.reward.submitReward', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubmitReward  $submitReward
     * @return \Illuminate\Http\Response
     */
    public function show(SubmitReward $submitReward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubmitReward  $submitReward
     * @return \Illuminate\Http\Response
     */
    public function edit(SubmitReward $submitReward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubmitReward  $submitReward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubmitReward $submitReward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubmitReward  $submitReward
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubmitReward $submitReward)
    {
        //
    }

    public function submitReward(Reward $reward, SubmitRewardRequest $request)
    {
        if($reward->point > auth()->user()->point || $reward->amount <= 0){
            return back()->with('error', trans('alert.submit_failed'));
        }else{

        $this->service->handleCreate($reward, $request);

            return to_route('student.rewards.index')->with('success', trans('alert.submit_success'));
        };
    }

    public function validStatus(SubmitReward $submitReward)
    {
        $this->service->handleUpadetValid($submitReward->id);

        return redirect()->back()->with('success', trans('alert.valid_success'));
    }
}
