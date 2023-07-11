<?php

namespace App\Http\Controllers;

use App\Models\SubmitReward;
use App\Services\SubmitRewardService;
use Illuminate\Http\Request;

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
        //
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
        $data = $request;
        $data['reward_id'] = $request->reward_id;
        $data['user_id'] = auth()->id();
        $data['phone_number'] = $request->phone_number;
        $data['address'] = $request->address;
        dd($data);
        $this->service->handleCreate($data);

        // return to_route('school.teachers.index')->with('success', trans('alert.add_success'));
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
}
