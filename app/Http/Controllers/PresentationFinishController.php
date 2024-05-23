<?php

namespace App\Http\Controllers;

use App\Services\PresentationFinishService;
use Illuminate\Http\Request;

class PresentationFinishController extends Controller
{
    private PresentationFinishService $service;

    public function __construct(PresentationFinishService $presentationFinish)
    {
        $this->service = $presentationFinish;
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function finish(Request $request, $projectId)
    {
        // dd(isset($request->progress));
        $next = false;
        if (isset($request->design)) {
            $this->service->setPresentationFinish($projectId, 'design');
            $next = true;
        }
        if (isset($request->beginning)) {
            $this->service->setPresentationFinish($projectId, 'beginning');
            $next = true;
        }
        if (isset($request->progress)) {
            $this->service->setPresentationFinish($projectId, 'progress');
            $next = true;
        }
        if (isset($request->finalization)) {
            $this->service->setPresentationFinish($projectId, 'finalization');
            $next = true;
        }
        if($next) {
            return redirect()->back()->with('success', 'Presentasi telah ditanndai selesai');
        }

        return redirect()->back()->with('error', 'Tidak ada presentasi yang diterima');
    }

    // public function getPresentationProgresh(Request $request, $projectId)
    // {
    //     $this->service->setPresentationFinish($projectId, $request);
    //     return redirect()->back()->with('success', 'Presentasi telah ditanndai selesai');
    // }

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
        //
    }
}
