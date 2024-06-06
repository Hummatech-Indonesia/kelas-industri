<?php

namespace App\Http\Controllers;

use App\Models\EventDocumentation;
use App\Services\EventDocumentationService;
use Illuminate\Http\Request;

class EventDocumentationController extends Controller
{
    private EventDocumentationService $service;

    public function __construct(EventDocumentationService $service)
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
        $this->service->handleCreate($request);

        return back()->with("success", "Berhasil menambahkan foto dokumentasi");
    }
    public function storeMultiple(Request $request, $eventId)
    {
        $documentation = $this->service->handleCreateMultiple($request, $eventId);
        return response()->json(['path' => $documentation->media, 'id' => $documentation->idinpu], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventDocumentation  $eventDocumentation
     * @return \Illuminate\Http\Response
     */
    public function show(EventDocumentation $eventDocumentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventDocumentation  $eventDocumentation
     * @return \Illuminate\Http\Response
     */
    public function edit(EventDocumentation $eventDocumentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventDocumentation  $eventDocumentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventDocumentation $eventDocumentation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventDocumentation  $eventDocumentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventDocumentation $eventDocumentation)
    {
        $this->service->handleDelete($eventDocumentation);
        // return back()->with('success', 'Berhasil menghapus foto dokumentasi');
        return response()->json('sucess');
    }
}
