<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Tripay\TripayController;
use App\Models\Packages;
use App\Services\PackageService;
use App\Http\Requests\PackageRequest;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public PackageService $packageService;

    public function __construct(PackageService $packageService)
    {
        $this->packageService = $packageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = auth()->user()->roles->pluck('name')[0];
        if ($role == 'administration') {
            $data = [
                'packages' => $this->packageService->HandleGetPackages(6)
            ];
            return view('dashboard.finance.pages.package.index', $data);
        }
        if ($role == 'school') {
            $data = [
                'packages' => $this->packageService->HandleGetPackages(6)
            ];
            return view('dashboard.admin.pages.package.index', $data);
        }
    }

    public function getPayment(Packages $package, )
    {
        $channel = new TripayController();
        
        // dd($channels);
        $data = [
            'products' => $this->packageService->getPackagePay($package->id),
            'channels' => $channel->getPaymentChannels(),
        ] ;
        // dd($products);
        return view('dashboard.admin.pages.package.getPay', $data);
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
    public function store(PackageRequest $request)
    {
        $request->validated();
        $this->packageService->handleStorePackage($request);
        return redirect()->back()->with('success', 'Data Berhasil Tertambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(PackageRequest $request, Packages $package)
    {
        $this->packageService->handleUpdatePackage($request, $package);
        return to_route('administration.package.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packages $package)
    {
        $data = $this->packageService->handleDeletePackage($package);

        if (!$data) {
            return to_route('administration.package.index')->with('error', trans('alert.delete_constrained'));
        }

        return to_route('administration.package.index')->with('success', trans('alert.update_success'));
    }
}
