<?php

namespace App\Http\Controllers\Spk;

use App\Models\Batch;
use App\Models\Generation;
use App\Models\Alternative;
use App\Excel\ExportDataset;
use App\Excel\ExportUser;
use App\Models\StudentSchool;
use App\Imports\ImportDataset;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\Spk\CriteriaRepository;
use App\Http\Requests\Spk\ImportExcelRequest;
use App\Models\User;
use App\Repositories\Spk\AlternativeRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GenerateExcelController extends Controller
{
    private CriteriaRepository $criteria;
    private AlternativeRepository $alternative;

    public function __construct(CriteriaRepository $criteria, AlternativeRepository $alternative)
    {
        $this->criteria = $criteria;
        $this->alternative = $alternative;
    }

    /**
     * Export Criterias and Alternatives into Excel File.
     *
     * @return BinaryFileResponse
     */

    public function export(Batch $batch): BinaryFileResponse
    {
        $criterias = $this->criteria->get();
        $alternatives = Alternative::query()->where('batch_id', $batch->id)->where('status', 1)->get();
        return (new ExportDataset($criterias, $alternatives))
            ->download('DATASET-FORMAT.xlsx');
    }

    /**
     * Import Criterias and Alternatives From Excel File Into Database.
     *
     * @param ImportExcelRequest $request
     * @param string $id
     * @return JsonResponse
     */

    public function import(ImportExcelRequest $request, string $id): JsonResponse
    {
        $request->validated();

        if ($request->hasFile('excel_file')) Excel::import(new ImportDataset($id), $request->file('excel_file'));

        return ResponseHelper::success(null, trans('alert.upload_excel_success'));
    }
}
