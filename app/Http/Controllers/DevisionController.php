<?php

namespace App\Http\Controllers;

use App\Http\Requests\DevisionRequest;
use App\Models\Devision;
use App\Services\DevisionService;
use Illuminate\Http\Request;

class DevisionController extends Controller
{
    public DevisionService $devisionService;

    public function __construct(DevisionService $devisionService)
    {
        $this->devisionService = $devisionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.admin.pages.division.index');
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
    public function store(DevisionRequest $request)
    {
        //
        $request->validated();
        $this->devisionService->handleStoreDevision($request);
        return redirect()->back()->with('success', 'Data Berhasil Tertambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Devision  $devision
     * @return \Illuminate\Http\Response
     */
    public function show(Devision $devision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Devision  $devision
     * @return \Illuminate\Http\Response
     */
    public function edit(Devision $devision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Devision  $devision
     * @return \Illuminate\Http\Response
     */
    public function update(DevisionRequest $request, Devision $devision)
    {
        //
        $request->validated();
        $this->devisionService->handleUpdateDevision($request, $devision);
        return redirect()->back()->with('success', 'Data Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Devision  $devision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devision $devision)
    {
        //
        $this->devisionService->handleDestroyDevision($devision);
        return redirect()->back()->with('success', 'Data Berhasil Terhapus');
    }
}
