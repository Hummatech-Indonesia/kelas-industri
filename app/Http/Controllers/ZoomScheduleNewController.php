<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZoomScheduleRequest;
use App\Repositories\ZoomScheduleRepository;
use Illuminate\Http\Request;

class ZoomScheduleNewController extends Controller
{
    private ZoomScheduleRepository $repository;
    public function __construct(ZoomScheduleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(ZoomScheduleRequest $request)
    {
        $this->repository->store($request->validated());
    }
}
