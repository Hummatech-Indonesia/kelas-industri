<?php

namespace App\Traits\Datatables;

use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

trait BatchDatatable
{

    /**
     * Datatable mockup for customers
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function BatchMockup(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->addIndexColumn()
            ->editColumn('through_criterias_count', function ($data) {
                return ($data->through_criterias_count) ?? '-';
            })
            ->editColumn('through_alternatives_count', function ($data) {
                return ($data->through_alternatives_count) ?? '-';
            })
            ->editColumn('through_criterias_count', function ($data) {
                return ($data->through_criterias_count) ?? '-';
            })
            ->editColumn('ranking', function ($data) {
                return $data->batch_results->first()->alternative->name ?? '-';
            })
            ->editColumn('status', function ($data) {
                return view('datatables.status', compact('data'));
            })
            ->editColumn('action', function ($data) {
                return view('datatables.action', compact('data'));
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
