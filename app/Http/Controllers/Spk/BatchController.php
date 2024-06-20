<?php

namespace App\Http\Controllers\Spk;

use App\Models\User;
use App\Models\Batch;
use App\Models\Criteria;
use Faker\Provider\Uuid;
use App\Models\Classroom;
use Illuminate\View\View;
use App\Models\Alternative;
use App\Models\BatchResult;
use Illuminate\Http\Request;
use App\Models\StudentSchool;
use App\Services\BatchService;
use App\Helpers\ResponseHelper;
use App\Services\CriteriaService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\BatchRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Repositories\ClassroomRepository;
use App\Repositories\Spk\BatchRepository;
use App\Repositories\GenerationRepository;
use App\Repositories\Spk\CriteriaRepository;

class BatchController extends Controller
{
    private BatchRepository $batch;
    private CriteriaRepository $criteria;
    private CriteriaService $service;
    private GenerationRepository $generation;
    private ClassroomRepository $classroom;
    private BatchService $batchService;

    public function __construct(BatchService $batchService,GenerationRepository $generation, BatchRepository $batch, CriteriaRepository $criteria, CriteriaService $service,ClassroomRepository $classroom)
    {
        $this->batch = $batch;
        $this->criteria = $criteria;
        $this->service = $service;
        $this->generation = $generation;
        $this->classroom = $classroom;
        $this->batchService = $batchService;
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
        if ($request->ajax()) {
            return $this->batch->datatable();
        }

        return view('dashboard.admin.pages.spk.calculation.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    public function create(): View
    {
        // if (!$this->service->handleValidWeight($this->criteria->sum())) {
        //     return to_route('admin.spk.criteria.index')->with('errors', trans('alert.invalid_weight'));
        // }
        $schools = User::query()
                    ->role('school')
                    ->get();
        return view('dashboard.admin.pages.spk.calculation.create',compact('schools'));
    }

    public function store(BatchRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $classroom = $this->classroom->show($request->classroom_id);

        if (!$this->service->handleValidWeight($this->criteria->sum($classroom->devision_id))) {
            return to_route('admin.spk.criteria.index')->with('errors', trans('alert.invalid_weight'));
        }

        $batch = $this->batch->store($data);

        $students =  StudentSchool::query()->whereRelation('classrooms.classroom','id',$request->classroom_id)->get();

        foreach($students as $student){
            Alternative::create([
                'student_school_id' => $student->id,
                'batch_id' => $batch->id
            ]);
        }

        $this->batchService->calculateScore($request,$batch,$classroom);

        return to_route('admin.spk.batch-results.update', $batch['id']);
    }

    /**
     * create the form given from mockup instance
     *
     * @param Batch $batch
     * @return View
     */

    public function createForm(Batch $batch): View
    {
        $data = [
            'id' => $batch->id,
            'totalCriterias' => $this->criteria->count(),
        ];

        return view('dashboard.admin.pages.spk.calculation.index', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Batch $batch
     *
     * @return JsonResponse
     */
    public function destroy(Batch $batch): JsonResponse
    {
        $this->batch->delete($batch->id);

        return ResponseHelper::success(null, trans('alert.delete_success'));
    }

    public function dashboard(Request $request)
    {
        $batches = Batch::query()->where('user_id',auth()->user()->id)->get();

        $selectedBatches = [];
        if (!$request->batches) {
            $batch = Batch::query()->where('user_id',auth()->user()->id)->latest()->first();

            if(!$batch) return view('dashboard.admin.pages.spk.no-data');

            $selectedBatches[0] = $batch->id;
        } else {
            $selectedBatches = $request->batches;
        }

        return view('dashboard.admin.pages.spk.index',compact('batches','selectedBatches'));
    }
}
