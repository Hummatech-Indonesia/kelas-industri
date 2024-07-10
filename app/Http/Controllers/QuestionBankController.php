<?php

namespace App\Http\Controllers;

use App\Models\SubMaterial;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use App\Services\QuestionBankService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\QuestionBankRequest;
use App\Repositories\QuestionBankRepository;
use App\Http\Requests\QuestionBankEssayRequest;

class QuestionBankController extends Controller
{
    private QuestionBankRepository $repository;
    private QuestionBankService $service;

    public function __construct(QuestionBankRepository $repository, QuestionBankService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMultipleChoise(SubMaterial $submaterial)
    {
        return view('dashboard.admin.pages.questionBank.indexMultipleChoise', compact('submaterial'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEssay(SubMaterial $submaterial)
    {
        return view('dashboard.admin.pages.questionBank.indexEssay', compact('submaterial'));
    }

    /**
     * Show the form for storeEssay a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeEssay(QuestionBankEssayRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'essay';
        $this->repository->store($data);
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionBankRequest $request)
    {
        $data = $request->validated();
        $this->repository->store($data);
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubMaterial $submaterial)
    {
        $questionBanks = $this->repository->handleGetBySubmaterial($submaterial->id, 10);
        return view('dashboard.admin.pages.questionBank.detail', compact('submaterial', 'questionBanks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionBank $questionBank)
    {
        $questionBank->with('questionBankAnswers', 'submaterial');
        if ($questionBank->type == 'essay') {
            return view('dashboard.admin.pages.questionBank.editEssay', compact('questionBank'));
        } else {
            return view('dashboard.admin.pages.questionBank.editMultipleChoise', compact('questionBank'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionBankRequest $request, $id)
    {
        $data = $request->validated();
        $this->repository->updateQuestion($data, $id);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEssay(Request $request, $id)
    {
        $this->service->getRequest($request, $id);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionBank $questionBank)
    {
        $data = $this->service->handleDelete($questionBank->id);

        if (!$data) return back()->with('error', trans('alert.delete_constrained'));

        return back()->with('success', trans('alert.delete_success'));
    }


    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $path = $file->store('questionBank', 'public'); // Simpan file di direktori 'public/uploads'

            $url = Storage::url($path);

            return response()->json([
                'url' => $url
            ]);
        }

        return response()->json(['error' => 'No file uploaded.'], 400);
    }
}
