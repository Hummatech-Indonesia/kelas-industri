<?php

namespace App\Traits\Datatables;

use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

trait AlternativeCriteriaDatatable
{

    /**
     * Datatable mockup for customers
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function alternativeCriteriaMockup(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->setRowId('pk_id')
            ->addColumn('alternative', function ($data) {
                return $data->alternative->studentSchool->student->name;
            })
            ->editColumn('score', function ($data) {
                return view('datatables.score', compact('data'));
            })
            ->toJson();
    }
}
