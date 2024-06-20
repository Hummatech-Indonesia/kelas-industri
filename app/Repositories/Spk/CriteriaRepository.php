<?php

namespace App\Repositories\Spk;

use Exception;
use App\Models\Criteria;
use App\Helpers\ResponseHelper;
use Illuminate\Database\QueryException;
use App\Repositories\Spk\BaseRepository;
use App\Traits\Datatables\CriteriaDatatable;

class CriteriaRepository extends BaseRepository
{
    use CriteriaDatatable;

    public function __construct(Criteria $criteria)
    {
        $this->model = $criteria;
    }

    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->active()
            ->oldest('id')
            ->get()
            ->toArray();
    }

    public function getAll(): mixed
    {
        return $this->model->query()
            ->active()
            ->oldest('id')
            ->get();
    }

    /**
     * Handle all data with datatables from models.
     *
     * @return mixed
     * @throws Exception
     */
    public function datatable(): mixed
    {
        return $this->CriteriaMockup($this->model->query()
            ->active());
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
        try {
            $data = $this->model->query()->create($data);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) return ResponseHelper::error(null, trans('alert.criteria_constrained'));
        }

        return $data;
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

    /**
     * Handle sum data event from models.
     *
     * @return int
     */
    public function sum(string $devision): int
    {
        return $this->model->query()
            ->where('devision_id',$devision)
            ->active()
            ->sum('weight');
    }

    /**
     * Handle count all data event from models.
     *
     *
     * @return int
     */
    public function count(): int
    {
        return $this->model->query()
            ->active()
            ->count();
    }
}
