<?php

namespace App\Http\Controllers\Spk;

use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Spk\AlternativeCriteriaRepository;

class AlternativeCriteriaController extends Controller
{
    private AlternativeCriteriaRepository $alternativeCriteria;

    public function __construct(AlternativeCriteriaRepository $alternativeCriteria)
    {
        $this->alternativeCriteria = $alternativeCriteria;
    }

    /**
     * Retrieve dataset by specified batch id.
     * @param Request $request
     * @param string $batch
     * @return mixed|void
     */
    public function retrieveDataset(Request $request, string $batch)
    {
        if ($request->ajax()) return $this->alternativeCriteria->showDatatable($batch);
    }

    /**
     * update dataset by specified batch id.
     * @param Request $request
     * @return JsonResponse
     */

    public function updateDataset(Request $request): JsonResponse
    {

        foreach ($request->datasets as $index => $value) $this->alternativeCriteria->update($index, $value);

        return ResponseHelper::success(null, trans('alert.update_success'));
    }
}
