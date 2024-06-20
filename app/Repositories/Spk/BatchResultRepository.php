<?php

namespace App\Repositories\Spk;

use App\Models\BatchResult;
use App\Repositories\Spk\BaseRepository;

class BatchResultRepository extends BaseRepository
{

    public function __construct(BatchResult $batchResult)
    {
        $this->model = $batchResult;
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
            ->where('batch_id', $id)
            ->with('alternative')
            ->get();
    }
}
