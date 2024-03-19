<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\SchoolService;
use App\Services\UserServices;
use Illuminate\View\View;

class TrackingPaymentController extends Controller
{
    private SchoolService $service;
    private UserServices $userService;

    public function __construct(SchoolService $service, UserServices $userService)
    {
        $this->service = $service;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $schools = $this->service->handleGetPaginate();
        $parameters = null;

        if (request()->has('search')) {
            $schools = $this->service->handleSearch(request()->search);
            $parameters = request()->query();
        }
        foreach ($schools as $school) {
            $schoolId = $school->id;
            $countStudent = $this->service->handleCountStudent($schoolId);
            $countStudents[$schoolId] = $countStudent->count();
        }
        $data = [
            'countStudents' => $countStudents,
            'schools' => $schools,
            'parameters' => $parameters,
        ];
        return view('dashboard.finance.pages.trackingPayment.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $userId
     * @return View
     */
    public function show($userId)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function allStudent($school){
        return view('dashboard.finance.pages.trackingPayment.student');
    }
    public function detailStudent(){
        return view('dashboard.finance.pages.trackingPayment.detailStudent');
    }
}

