<?php

namespace App\Traits\Datatables;

use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

trait AlternativeDatatable
{

    /**
     * Datatable mockup for customers
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function AlternativeMockup(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->addIndexColumn()
            ->editColumn('action', function ($data) {
                return view('dashboard.pages.alternatives.datatables.action', compact('data'));
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
