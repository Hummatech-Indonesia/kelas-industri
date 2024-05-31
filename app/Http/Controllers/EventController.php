<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\UserServices;
use App\Services\SchoolService;
use App\Http\Requests\EventRequest;
use Illuminate\Contracts\View\View;
use App\Http\Requests\UpdateEventRequest;
use App\Services\EventService;
use App\Traits\DataSidebar;

use function PHPUnit\Framework\returnSelf;

class EventController extends Controller
{
    use DataSidebar;
    private SchoolService $schoolService;
    private UserServices $userService;
    private EventService $service;

    public function __construct(SchoolService $schoolService, UserServices $userService, EventService $service)
    {
        $this->schoolService = $schoolService;
        $this->userService = $userService;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view("dashboard.admin.pages.event.index");
    }


    public function showSchools(): View
    {
        $schools = $this->schoolService->handleGetPaginate();
        $parameters = null;

        if (request()->has('search')) {
            $schools = $this->schoolService->handleSearch(request()->search);
            $parameters = request()->query();
        }
        $data = [
            'schools' => $schools,
            'parameters' => $parameters,
            'events' => $this->service->handleGetPaginate(),
        ];
        return view('dashboard.admin.pages.event.school', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['schools'] = $this->userService->handleGetAllSchool();
        return view('dashboard.admin.pages.event.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $this->service->handleCreate($request);
        return to_route('admin.events.schools')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $data = $this->GetDataSidebar();
        $data['event'] = $event;

        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            return view('dashboard.admin.pages.event.detail', $data);
        } else if (auth()->user()->roles->pluck('name')[0] == 'student') {
            return view('dashboard.user.pages.event.detail', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $data['schools'] = $this->userService->handleGetAllSchool();
        $data['event'] = $event;
        return view('dashboard.admin.pages.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $this->service->handleUpdate($id, $request);

        return to_route('admin.events.edit', $id)->with('success', trans('update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
