<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use Illuminate\Http\Request;
use App\Services\PresentationService;
use App\Http\Requests\PresentationRequest;

class PresentationController extends Controller
{
    private PresentationService $service;

    public function __construct(PresentationService $service)
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
}
