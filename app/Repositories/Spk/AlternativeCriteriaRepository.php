<?php

namespace App\Repositories\Spk;

use Exception;
use App\Helpers\ResponseHelper;
use App\Models\AlternativeCriteria;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;
use App\Traits\Datatables\AlternativeCriteriaDatatable;

class AlternativeCriteriaRepository extends BaseRepository
{
    use AlternativeCriteriaDatatable;

    public function __construct(AlternativeCriteria $alternativeCriteria)
    {
        $this->model = $alternativeCriteria;
    }

    /**
     * Handle get the specified data by id from models.
     *
     * @param mixed $id
     *
     * @return mixed
     * @throws Exception
     */
    public function showDatatable(mixed $id): mixed
    {
        return $this->alternativeCriteriaMockup($this->model->query()
            ->select('alternative_criterias.id AS pk_id', 'batch_id', 'criteria_id', 'alternative_id', 'score')
            ->with(['alternative', 'criteria'])
            ->where('batch_id', $id)
            ->oldest('pk_id'));
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
        try {
            return $this->model->query()
                ->findOrFail($id)
                ->update($data);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1048) return ResponseHelper::error(null, trans('alert.dataset_invalid'));
        }

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
        return $this->model->query()
            ->select('alternative_criterias.id AS pk_id', 'batch_id', 'criteria_id', 'alternative_id', 'score')
            ->with(['alternative', 'criteria'])
            ->where('batch_id', $id)
            ->oldest('pk_id');
    }
}
