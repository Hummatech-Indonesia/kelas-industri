<?php

namespace App\Http\Controllers;

use HTMLPurifier;
use Carbon\Carbon;
use App\Models\Event;
use HTMLPurifier_Config;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Services\EventService;
use App\Services\UserServices;
use App\Services\SchoolService;
use App\Http\Requests\EventRequest;
use Illuminate\Contracts\View\View;
use App\Services\EventParticipantService;

class EventController extends Controller
{
    use DataSidebar;
    private SchoolService $schoolService;
    private UserServices $userService;
    private EventService $service;
    private EventParticipantService $eventParticipantService;

    public function __construct(SchoolService $schoolService, UserServices $userService, EventService $service, EventParticipantService $eventParticipantService)
    {
        $this->schoolService = $schoolService;
        $this->userService = $userService;
        $this->service = $service;
        $this->eventParticipantService = $eventParticipantService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
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
            'events' => $this->service->handleGetPaginate($request->search),
        ];
        return view('dashboard.admin.pages.event.school', $data);
    }

    public function studentEvent(Request $request): View
    {
        $data = $this->GetDataSidebar();
        $data['events'] = $this->service->handleGetPaginate($request->search);
        // $config = HTMLPurifier_Config::createDefault();
        // $config->set('HTML.Allowed', '');
        // $purifier = new HTMLPurifier($config);

        // foreach ($data['events'] as $event) {
        //     $event->description = $purifier->purify($event->description);
        // }
        return view('dashboard.user.pages.event.index', $data);
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
            'events' => $this->service->handleGetPaginate(6),
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
        return to_route('admin.events.index')->with('success', trans('alert.add_success'));
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
        // $data['event']->is_start = $event->start_date > now();
        $data['participant'] = $this->eventParticipantService->checkFollowing($event->id, auth()->user()->id);

        // dd($data);
        if (auth()->user()->roles->pluck('name')[0] == 'admin') {
            return view('dashboard.admin.pages.event.detail', $data);
        } else if (auth()->user()->roles->pluck('name')[0] == 'student') {
            return view('dashboard.user.pages.event.detail', $data);
        }
    }

    public function showParticipants(Event $event)
    {
        $data['event'] = $event;

        return view('dashboard.admin.pages.event.participant', $data);
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
        $data['event']->is_start = $event->start_date >= Carbon::now();
    // dd($data['event']['is_start']);
        return view('dashboard.admin.pages.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        // dd($request);
        if ($event->start_date < now() && $request->file) {
            return redirect()->back()->with('error', 'Belum Saatnya mengisi foto dokumentasi.');
        }
        $this->service->handleUpdate($event, $request);

        return to_route('admin.events.edit', $event->id)->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $this->service->handleDelete($event);
        return back()->with('success', trans('alert.delete_success'));
    }
}
