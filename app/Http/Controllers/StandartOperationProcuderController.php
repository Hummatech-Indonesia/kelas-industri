<?php

namespace App\Http\Controllers;

use App\Http\Requests\StandartOperationProcuderRequest;
use App\Models\StandartOperationProcedure;
use App\Services\StandartOperationProcuderService;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;

class StandartOperationProcuderController extends Controller
{
    use DataSidebar;

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
     * forUser
     *
     * @return void
     */
    public function forUser()
    {
        $data = $this->GetDataSidebar();
        $data['sop'] = $this->standartOperationProcuder->getByRole();
        return view('dashboard.admin.pages.SOP.foruser', $data);
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
        return to_route('admin.standart-operation-producer.index')->with('success', trans('alert.add_success'));
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
    public function edit(StandartOperationProcedure $standart_operation_producer)
    {
        $sop = $standart_operation_producer;
        return view('dashboard.admin.pages.SOP.edit', compact('sop'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $standart_operation_producer
     * @return void
     */
    public function update(StandartOperationProcuderRequest $request, StandartOperationProcedure $standart_operation_producer)
    {
        $this->standartOperationProcuder->update($standart_operation_producer, $request);
        return to_route('admin.standart-operation-producer.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StandartOperationProcedure $standart_operation_producer)
    {
        // dd($standart_operation_producer->id);
        $this->standartOperationProcuder->delete($standart_operation_producer);
        return to_route('admin.standart-operation-producer.index')->with('success', trans('alert.delete_success'));
    }
}
