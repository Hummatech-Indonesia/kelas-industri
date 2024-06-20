<?php

namespace App\Repositories\Spk;

use Exception;
use App\Models\Batch;
use App\Helpers\ResponseHelper;
use Illuminate\Support\Facades\DB;
use App\Repositories\Spk\BaseRepository;
use App\Traits\Datatables\BatchDatatable;
use App\Traits\Datatables\AlternativeCriteriaDatatable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BatchRepository extends BaseRepository
{
    use BatchDatatable, AlternativeCriteriaDatatable;

    public function __construct(Batch $batch)
    {
        $this->model = $batch;
    }

    /**
     * Handle all data with datatables from models.
     *
     * @return mixed
     * @throws Exception
     */
    public function datatable(): mixed
    {
        return $this->BatchMockup($this->model->query()
            ->withCount(['through_alternatives as through_alternatives_count' => function ($query) {
                $query->select(DB::raw('count(DISTINCT alternative_id)'))->groupBy('batches.id');
            }])
            ->withCount(['through_criterias as through_criterias_count' => function ($query) {
                $query->select(DB::raw('count(DISTINCT criteria_id)'))->groupBy('batches.id');
            }])
            ->with(['batch_results' => function ($query) {
                $query->where('rank', 1)
                    ->with('alternative');
            }])
            ->latest()
            ->get());
    }

    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->withCount(['through_alternatives as through_alternatives_count' => function ($query) {
                $query->select(DB::raw('count(DISTINCT alternative_id)'))->groupBy('batch_id');
            }])
            ->withCount(['through_criterias as through_criterias_count' => function ($query) {
                $query->select(DB::raw('count(DISTINCT criteria_id)'))->groupBy('batch_id');
            }])
            ->with(['batch_results' => function ($query) {
                $query->where('rank', 1)
                    ->with('alternative');
            }])
            ->latest()
            ->get();
    }

    /**
     * Handle get the specified data by id from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        try {
            return $this->model->query()
                ->whereHas('alternative_criterias')
                ->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return ResponseHelper::error(null, trans('alert.dataset_invalid'));
        }

    }

    /**
     * Handle store data event to models.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    /**
     * Handle show method and delete data instantly from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->delete();
    }

    /**
     * Handle show method and update data instantly from models.
     *
     * @param mixed $id
     * @param array $data
     *
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->update($data);
    }
}
