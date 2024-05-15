<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\SchoolPackage;
use App\Repositories\BaseRepository;

class SchoolPackageRepository extends BaseRepository
{

    public function __construct(SchoolPackage $model)
    {
        $this->model = $model;
    }

    public function filter_paginate(String|null $schoolId, String|null $status, $limit)
    {
        return $this->model->query()
            ->when($schoolId && $schoolId !== 'all', function ($query) use ($schoolId) {
                $query->where('school_id', $schoolId);
            })
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->paginate($limit);
    }

    public function getGroupByMonth(): mixed
    {
        return $this->model
            ->whereYear('created_at', Carbon::now()->locale('id')->year)
            ->get(['updated_at', 'status', 'price'])->groupBy(function ($val) {
                return Carbon::parse($val->updated_at)->translatedFormat('M');
            });
    }
}
