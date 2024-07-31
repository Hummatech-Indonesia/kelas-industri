<?php

namespace App\Http\Controllers;

use App\Http\Requests\StandartOperationProcuderRequest;
use App\Services\StandartOperationProcuderService;
use Illuminate\Http\Request;

class StandartOperationProcuderController extends Controller
{
    private StandartOperationProcuderService $standartOperationProcuder;

    public function __construct(StandartOperationProcuderService $standartOperationProcuder)
    {
        $this->standartOperationProcuder = $standartOperationProcuder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sops = $this->standartOperationProcuder->get();
        return view('dashboard.admin.pages.SOP.index', compact('sops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.pages.SOP.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StandartOperationProcuderRequest $request)
    {
        $this->standartOperationProcuder->store($request);
        return to_route('admin.standart-operation-producer.index');
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
        //
    }
}
