<?php

namespace App\Http\Controllers\Api\Journal;

use App\Http\Controllers\Controller;
use App\Services\JournalService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\JournalRequest;
use App\Models\Journal;
use App\Services\JournalAttendanceService;

class JournalController extends Controller
{
    private JournalService $journalService;
    private JournalAttendanceService $journalAttendaceService;

    public function __construct(JournalService $journalService, JournalAttendanceService $journalAttendanceService)
    {
        $this->journalService = $journalService;
        $this->journalAttendaceService = $journalAttendanceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $journals = $this->journalService->handleGetJournalByUser();

        return response()->json([
            'message' => 'Berhasil mengambil data jurnal',
            'data' => $journals
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  JournalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JournalRequest $request)
    {
        if ($request->photo != null) {
            if (Carbon::now()->format('l') == "sunday" && auth()->user()->roles->pluck('name')[0] == 'teacher') {
                return response()->json([
                    'message' => 'Tidak bisa mengisi jurnal, dikarenakan hari ini minggu!'
                ], 400);
            }
            $journal = $this->journalService->handleCreate($request);
            $this->journalAttendaceService->handleCreate($request->attendance, $journal->id);

            return response()->json([
                'message' => 'Berhasil membuat jurnal',
                'data' => $journal
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        return response()->json([
            'message' => 'Berhasil menampilkan jurnal',
            'data' => $this->journalService->handleShowJournal($journal->id)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  JournalRequest  $request
     * @param  Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(JournalRequest $request, Journal $journal)
    {
        $this->journalService->handleUpdate($request, $journal);

        // memperbarui absensi siswa 
        $this->journalAttendaceService->handleDeleteByJournal($journal->id);
        $this->journalAttendaceService->handleCreate($request->attendance, $journal->id);

        return response()->json([
            'message' => 'Berhasil memperbarui jurnal'
        ], 200);
    }

    /**
     * Remove the specified resource from storage
     * 
     * @param  Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        $this->journalService->handleDelete($journal);

        return response()->json([
            'message' => 'Berhasil menghapus jurnal',
            'data' => $journal
        ], 200);
    }
}
