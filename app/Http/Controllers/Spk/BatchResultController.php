<?php

namespace App\Http\Controllers\Spk;

use App\Models\Batch;
use Illuminate\View\View;
use App\Models\BatchResult;
use App\Enums\BatchStatusEnum;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Services\BatchResultService;
use App\Repositories\Spk\BatchRepository;
use App\Repositories\Spk\BatchResultRepository;
use Illuminate\Http\Request;

class BatchResultController extends Controller
{
    private BatchResultRepository $result;
    private BatchResultService $service;
    private BatchRepository $batch;

    public function __construct(BatchResultRepository $result, BatchResultService $service, BatchRepository $batch)
    {
        $this->result = $result;
        $this->service = $service;
        $this->batch = $batch;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Batch $batch_result): JsonResponse
    {
        $id = $batch_result->id;
        $show = $this->batch->show($id);

        $data = $this->handleCalculateTopsis($id);
        if ($show->status == BatchStatusEnum::PENDING->value) {
            $this->batch->update($id, ['status' => BatchStatusEnum::SUCCESS->value]);
            $this->service->handleUpdateBatchRanks($id, $this->handleCalculateTopsis($id));
        }

        $data['batch_preferences'] = $show->sortBy('rank');
        return ResponseHelper::success(null, trans('alert.batch_completed'));
    }

    /**
     * Display the specified resource.
     *
     * @param Batch $batch_result
     *
     * @return View
     */
    public function show(Batch $batch_result): View
    {
        $id = $batch_result->id;


        $batch = Batch::findOrFail($batch_result->id);
        if ($batch->status == BatchStatusEnum::PENDING->value) {
            $this->batch->update($id, ['status' => BatchStatusEnum::SUCCESS->value]);
            $this->service->handleUpdateBatchRanks($id, $this->handleCalculateTopsis($id));
        }
        $show = $this->result->show($id);
        $data = $this->handleCalculateTopsis($id);
        $data['batch_preferences'] = $show->sortBy('rank');

        return view('dashboard.admin.pages.spk.calculation.result', $data);
    }
    

    public function statistic(Batch $batch)
    {
        $alternatives = Alternative::query()
            ->with('alternative_criterias')
            ->where('batch_id',$batch->id)
            ->get();
        
        $results = BatchResult::query()
                ->where('batch_id',$batch->id)
                ->orderBy('rank')
                ->get();

        return view('dashboard.admin.pages.spk.calculation.statistic',compact('batch','alternatives','results'));
    }

    public function development(Alternative $alternative)
    {
             $batchs = Batch::query()
                    ->whereRelation('classroom.students.studentSchool','id',$alternative->student_school_id)
                    ->where('status',BatchStatusEnum::SUCCESS->value)
                    ->orderBy('created_at')
                    ->get();

        return view('dashboard.admin.pages.spk.calculation.development',compact('alternative','batchs'));
    }

    /**
     * Handle Calculate Topsis Result
     *
     * @param string $id
     * @return array
     */

    private function handleCalculateTopsis(string $id): array
    {
        $xn_datas = $this->service->handleXnDatas($id);
        $relative_weight_datas = $this->service->handleRelativeWeight($xn_datas, $id);
        $yij_datas = $this->service->handleYijDatas($relative_weight_datas, $id);
        $ideal_solution_datas = $this->service->handleIdealSolution($yij_datas, $id);
        $distance_datas = $this->service->handleEucledianDistance($yij_datas, $ideal_solution_datas, $id);
        $preference_datas = $this->service->handlePreferenceDatas($distance_datas, $id);

        return [
            'result' => $this->result->show($id),
            'criterias' => $this->service->handleCriterias($id),
            'alternatives' => $this->service->handleAlternatives($id),
            'xn_datas' => $xn_datas,
            'relative_weight_datas' => $relative_weight_datas,
            'yij_datas' => $yij_datas,
            'ideal_solution_datas' => $ideal_solution_datas,
            'distance_datas' => $distance_datas,
            'preference_datas' => $preference_datas
        ];
    }

    /**
     * Handle Export to pdf
     *
     * @param string $batch_id
     * @return View
     */

    public function exportPdf(string $batch_id): View
    {
        return view('dashboard.pages.batches.pdf', [
            'batch_id' => $batch_id,
            'finalRanks' => $this->result->show($batch_id)->sortBy('rank')
        ]);
    }

}
