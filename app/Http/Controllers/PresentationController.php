<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresentationRequest;
use App\Models\Presentation;
use App\Services\NotificationService;
use App\Services\PresentationService;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    private PresentationService $service;
    private NotificationService $notificationService;

    public function __construct(PresentationService $service, NotificationService $notificationService)
    {
        $this->service = $service;
        $this->notificationService = $notificationService;
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
    public function store(PresentationRequest $request)
    {
        $this->service->handleCreate($request);
        return redirect()->back()->with('success', 'Berhasil mengajukan presentasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function show(Presentation $presentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentation $presentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presentation $presentation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentation $presentation)
    {
        //
    }

    /**
     * approvalPresentation
     *
     * @param  mixed $presentation
     * @return void
     */
    public function approvalPresentation(Presentation $presentation)
    {
        $this->service->handleApprovalPresentation($presentation->id);
        return redirect()->back()->with('success', 'Presentasi ' . $presentation->project->user->name . ' berhasil di Setujui');
    }

    /**
     * rejectPresentation
     *
     * @param  mixed $presentation
     * @return void
     */
    public function rejectPresentation(Presentation $presentation, Request $request)
    {
        $this->service->handleRejectPresentation($presentation->id, $request->pending_date);
        $this->notificationService->createRejectPresentationNotification($presentation->project->id, $request);
        return redirect()->back()->with('success', 'Presentasi ' . $presentation->name . ' berhasil di Tolak');
    }
}
