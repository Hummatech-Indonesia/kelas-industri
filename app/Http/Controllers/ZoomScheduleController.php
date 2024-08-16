<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use function request;
use Illuminate\View\View;
use App\Models\ZoomSchedule;
use Illuminate\Http\Response;
use App\Services\UserServices;
use App\Helpers\SchoolYearHelper;
use App\Services\ClassroomService;
use App\Services\ZoomScheduleService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ZoomScheduleRequest;

class ZoomScheduleController extends Controller
{
    private ZoomScheduleService $service;
    private ClassroomService $classroomService;
    private UserServices $userServices;

    public function __construct(ZoomScheduleService $service, ClassroomService $classroomService, UserServices $userServices)
    {
        $this->service = $service;
        $this->classroomService = $classroomService;
        $this->userServices = $userServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(): mixed
    {
        if (request()->ajax()) return $this->service->handleGetAll();
        return view('dashboard.admin.pages.zoomSchedule.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): mixed
    {
        $currentSchoolYear = SchoolYearHelper::get_current_school_year();
        if (request()->ajax()) return $this->classroomService->handleGetBySchool(request()->school_id, $currentSchoolYear->id);

        $data = [
            'schools' => $this->userServices->handleGetAllSchool(),
            'mentors' => $this->userServices->handleGetAllMentor()
        ];

        return view('dashboard.admin.pages.zoomSchedule.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ZoomScheduleRequest $request
     * @return RedirectResponse
     */
    public function store(ZoomScheduleRequest $request): RedirectResponse
    {
        $this->service->handleCreate($request);

        return to_route('admin.zoom-schedules.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ZoomSchedule $zoomSchedule
     * @return View
     */
    public function edit(ZoomSchedule $zoomSchedule): View
    {
        $data = [
            'schools' => $this->userServices->handleGetAllSchool(),
            'mentors' => $this->userServices->handleGetAllMentor(),
            'zoomSchedule' => $zoomSchedule
        ];

        return \view('dashboard.admin.pages.zoomSchedule.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ZoomScheduleRequest $request
     * @param ZoomSchedule $zoomSchedule
     * @return RedirectResponse
     */
    public function update(ZoomScheduleRequest $request, ZoomSchedule $zoomSchedule): RedirectResponse
    {
        $this->service->handleUpdate($request, $zoomSchedule->id);

        return to_route('admin.zoom-schedules.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ZoomSchedule $zoomSchedule
     * @return RedirectResponse
     */
    public function destroy(ZoomSchedule $zoomSchedule): RedirectResponse
    {
        $data = $this->service->handleDelete($zoomSchedule->id);

        if (!$data) return back()->with('error', trans('alert.delete_constrained'));

        return back()->with('success', trans('alert.delete_success'));
    }

    public function first()
    {
        $zoomSchedules = ZoomSchedule::whereMonth('date', Carbon::now()->month)
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy('classroom_id')
            ->map(function ($schedules) {
                return $schedules->first();
            });

        // dd($zoomSchedules);
        foreach ($zoomSchedules as $schedule) {
            // Hapus semua jadwal untuk bulan ini
            ZoomSchedule::whereMonth('date', Carbon::parse($schedule->date)->month)->delete();

            // Tambahkan 1 minggu ke tanggal
            $schedule->date = Carbon::create($schedule->date)->addWeek();
            $startDate = Carbon::create($schedule->date);

            // Ambil tanggal pertama di bulan yang sama
            $firstDayOfMonth = $startDate->copy()->startOfMonth();

            // Ambil tanggal terakhir di bulan yang sama
            $lastDayOfMonth = $startDate->copy()->endOfMonth();

            info($lastDayOfMonth);

            // Loop dari tanggal mulai hingga akhir bulan
            while ($startDate->lte($lastDayOfMonth)) {
                // Salin objek $schedule sebelum menambahkan minggu
                $scheduleData = clone $schedule;

                // Tambah 1 minggu
                $scheduleData->date = $startDate->toDateTimeString();

                // Simpan ke database
                ZoomSchedule::create($scheduleData->toArray());

                // Tambah 1 minggu ke $startDate untuk iterasi berikutnya
                $startDate->addWeek();
            }
        }
        // dd($zoomSchedules);
    }
}
