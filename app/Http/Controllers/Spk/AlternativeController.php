<?php

namespace App\Http\Controllers\Spk;

use Illuminate\View\View;
use App\Models\Alternative;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Spk\AlternativeRepository;
use App\Http\Requests\Dashboard\AlternativeRequest;

class AlternativeController extends Controller
{
    private AlternativeRepository $alternative;

    public function __construct(AlternativeRepository $alternative)
    {
        $this->alternative = $alternative;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $alternatives = $this->alternative->getAll();

        return view('dashboard.admin.pages.spk.alternative.index', compact('alternatives'));
    }

    public function create()
    {
        return view('dashboard.admin.pages.spk.alternative.create');
    }

    public function edit(Alternative $alternative)
    {
        return view('dashboard.admin.pages.spk.alternative.update', compact('alternative'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AlternativeRequest $request
     *
     * @return JsonResponse
     */
    public function store(AlternativeRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->ajax()) $this->alternative->store($data);

        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AlternativeRequest $request
     * @param Alternative $alternative
     *
     * @return JsonResponse
     */
    public function update(AlternativeRequest $request, Alternative $alternative): JsonResponse
    {
        $data = $request->validated();

        if ($request->ajax()) $this->alternative->update($alternative->id, $data);

        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Alternative $alternative
     * @return JsonResponse
     */
    public function destroy(Alternative $alternative): JsonResponse
    {
        $this->alternative->delete($alternative->id);

        return ResponseHelper::success(null, trans('alert.delete_success'));
    }
}
