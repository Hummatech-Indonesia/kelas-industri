<?php

namespace App\Services;

use App\Models\SchoolPackage;
use Illuminate\Http\Request;
use App\Repositories\SchoolPackageRepository;

class SchoolPackageService
{

    private SchoolPackageRepository $repository;

    public function __construct(SchoolPackageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleFilter(String|null $schoolId, String|null $status)
    {
        return $this->repository->filter_paginate($schoolId, $status, 10);
    }

    public function handleCreate(Request $request)
    {
        $this->repository->store($request->all());
    }

    public function handleUpdate(Request $request, $id)
    {
        $this->repository->update($id, $request->all());
    }
    
    public function handleDelete(SchoolPackage $schoolPackage): bool
    {
        return $this->repository->destroy($schoolPackage->id);
    }

    public function handleChangeStatus(Request $request, $id)
    {
        $this->repository->update($id, $request->all());
    }

    public function handleGetGroupByMonth(): mixed
    {
        $raw = $this->repository->getGroupByMonth();
        $data = [];
        foreach ($raw as $month => $incomes) {
            $paid = 0;
            $dept = 0;
            foreach ($incomes as $payment) {
                if($payment->status == 'already_paid') {
                    $paid += $payment->price;
                }
                if($payment->status == 'debt') {
                    $dept += $payment->price;
                }
            }
            $data[$month] = [
                'dept' => $dept,
                'paid' => $paid
            ];
        }
        return $data;
    }
}
