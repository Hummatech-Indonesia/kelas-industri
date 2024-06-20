<?php

namespace App\Traits\Datatables;

use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

trait CriteriaDatatable
{

    /**
     * Datatable mockup for customers
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function CriteriaMockup(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->addIndexColumn()
            ->editColumn('type', function ($data) {
                return view('dashboard.pages.criterias.datatables.type', compact('data'));
            })
            ->editColumn('action', function ($data) {
                return view('dashboard.pages.criterias.datatables.action', compact('data'));
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
