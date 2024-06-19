<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ScheduleService;
use App\Services\UserServices;
use App\Traits\DataSidebar;

class ScheduleController extends Controller
{
    use DataSidebar;
    private ScheduleService $service;
    private UserServices $userServices;
    public function __construct(ScheduleService $service, UserServices $userServices)
    {
        $this->service = $service;
        $this->userServices = $userServices;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'schools' => $this->userServices->handleGetAllSchool(),
        ];
        return view('dashboard.admin.pages.schedule.index', $data);
    }
    public function indexStudent()
    {
        $data = $this->GetDataSidebar();
        // $data = [
        //     'schools' => $this->userServices->handleGetAllSchool(),
        // ];
        return view('dashboard.user.pages.schedule.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $events = $this->service->handleGetAll($request);
        return response()->json(['events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->service->handleStore($request);

        return response()->json();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->handleDelete($id);
        return response()->json();
    }
}
