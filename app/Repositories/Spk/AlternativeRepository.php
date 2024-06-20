<?php

namespace App\Repositories\Spk;

use App\Repositories\Spk\BaseRepository;
use App\Models\Alternative;
use App\Traits\Datatables\AlternativeDatatable;
use Exception;

class AlternativeRepository extends BaseRepository
{
    use AlternativeDatatable;

    public function __construct(Alternative $alternative)
    {
        $this->model = $alternative;
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

    public function getAll() : mixed
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
        return $this->AlternativeMockup($this->model->query()
            ->active());
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
            ->update(['status' => 0]);
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
}
