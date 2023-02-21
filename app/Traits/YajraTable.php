<?php

namespace App\Traits;

use App\Helpers\CurrencyFormatter;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

trait YajraTable
{

    /**
     * Datatable mockup for classroom resource
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function SchoolInactiveMockup(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return view('dashboard.pages.schools.datatable-components.activate', compact('data'));
            })
            ->editColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->format('d M Y');
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Datatable mockup for classroom resource
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function TeacherMockup(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return view('dashboard.pages.teachers.datatable-components.resetpassword', compact('data'));
            })
            ->editColumn('is_premium', function ($data) {
                return view('dashboard.pages.teachers.datatable-components.premium', compact('data'));
            })
            ->editColumn('user_instances.instance.name', function ($data) {
                return view('dashboard.pages.teachers.datatable-components.instances', compact('data'));
            })
            ->editColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->format('d M Y');
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Datatable mockup for Revenue
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function RevenueMockup(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->addIndexColumn()
            ->editColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->format('d M Y h:i');
            })
            ->editColumn('paid_amount', function ($data) {
                return CurrencyFormatter::rupiahCurrency($data->paid_amount);
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Datatable mockup for my history
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function myHistoryMockup(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->addIndexColumn()
            ->editColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->format('d M Y h:i');
            })
            ->editColumn('paid_amount', function ($data) {
                return is_null($data->paid_amount) ? '-' : CurrencyFormatter::rupiahCurrency($data->paid_amount);
            })
            ->editColumn('payment_channel', function ($data) {
                return is_null($data->payment_channel) ? '-' : $data->payment_channel;
            })
            ->editColumn('invoice_status', function ($data) {
                return view('dashboard.pages.my-histories.invoice_status', compact('data'));
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Datatable mockup for teacher classrooms
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function teacherClassrooms(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->addIndexColumn()
            ->setRowId('id')
            ->editColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->translatedFormat('d F Y');
            })
            ->editColumn('status', function ($data) {
                return view('dashboard.pages.teacher-approvals.datatables.status', compact('data'));
            })
            ->editColumn('approval_value', function ($data) {
                return view('dashboard.pages.teacher-approvals.datatables.checkbox', compact('data'));
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Datatable mockup for student scores
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function studentScores(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->addIndexColumn()
            ->setRowId('id')
            ->editColumn('name', function ($data) {
                return view('dashboard.pages.modules.datatables.name', compact('data'));
            })
            ->editColumn('scores', function ($data) {
                return view('dashboard.pages.modules.datatables.scores', compact('data'));
            })
            ->editColumn('description', function ($data) {
                return view('dashboard.pages.modules.datatables.description', compact('data'));
            })
            ->toJson();
    }
}
