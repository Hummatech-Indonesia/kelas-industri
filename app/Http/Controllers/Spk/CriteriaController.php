<?php

namespace App\Http\Controllers\Spk;

use App\Models\Criteria;
use App\Models\Devision;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Services\CriteriaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Spk\CriteriaRequest;
use App\Repositories\Spk\CriteriaRepository;

class CriteriaController extends Controller
{
    private CriteriaService $service;
    private CriteriaRepository $criteria;

    public function __construct(CriteriaService $service, CriteriaRepository $criteria)
    {
        $this->service = $service;
        $this->criteria = $criteria;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     *
     * @return View
     */

    public function index(Request $request,Devision $devision): View
    {
        return view('dashboard.admin.pages.division.criteria', compact('devision'));
    }

    public function create(): View
    {
        $criterias = $this->criteria->getAll();

        return view('dashboard.admin.pages.spk.criteria.create', compact('criterias'));
    }

    public function edit(Criteria $criterion) : View
    {
        $criterias = $this->criteria->getAll();

        return view('dashboard.admin.pages.spk.criteria.update', compact('criterias', 'criterion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CriteriaRequest $request
     * @return RedirectResponse
     */

    public function store(CriteriaRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (!$this->service->handleCheckWeight($data['weight'], $this->criteria->sum($request->devision_id))) {

            return redirect()->back()->with('error','Bobot Melebihi 100');
            
        }

        $this->criteria->store($data);

        return redirect()->back()->with('success','Berhasil Menambahkan Data!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CriteriaRequest $request
     * @param Criteria $criteria
     * @return JsonResponse
     */

    public function update(CriteriaRequest $request, Criteria $criterias): RedirectResponse
    {
        $data = $request->validated();

        $new_weight = $this->criteria->sum($criterias->devision_id) - $criterias->weight;

        if (!$this->service->handleCheckWeight($data['weight'], $new_weight)) {
            return redirect()->back()->withErrors(['weight' => 'Total Bobot Melebihi 100'])->withInput();
        }

        $this->criteria->update($criterias->id, $data);

        return redirect()->back()->with('success',trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Criteria $criteria
     *
     * @return RedirectResponse
     */
    public function destroy(Criteria $criterias): RedirectResponse
    {
        $this->criteria->delete($criterias->id);

        return Redirect()->back()->with('success','Berhasil Menghapus Data');
    }

    /**
     * Fetch Weight from all criterias
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function fetchWeight(Request $request): JsonResponse
    {
        if ($request->ajax()) return ResponseHelper::success($this->criteria->sum(), trans('alert.sum_success'));

        abort(403);
    }
}
