<?php

namespace App\Services;

use App\Http\Requests\PackageRequest;
use App\Models\Packages;
use App\Repositories\PackageRepository;
use Illuminate\Support\Facades\Storage;

class PackageService
{
    public  PackageRepository $repository;

    public function __construct(PackageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function HandleGetPackages($limit, $request)
    {
        return $this->repository->getPackages($limit, $request);

    }

    public function handleStorePackage(PackageRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('package_file', 'public');
        $this->repository->store($data);
    }
    /**
     * update school year
     *
     * @param PackageRequest $request
     * @param Packages $package
     * @return void
     */
    public function handleUpdatePackage(PackageRequest $request, Packages $package) : void
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $package->image);
            $data['image'] = $request->file('image')->store('package_file', 'public');
        }
        $this->repository->update($package->id, $data);
    }
    public function handleDeletePackage(Packages $package) : bool
    {
        if ($package->photo) {
            Storage::delete('public/' . $package->photo);
        }
        return $this->repository->destroy($package->id);
    }

    public function getPackagePay($idPack)
    {
        return $this->repository->getPackagePay($idPack);
    }

    public function handleGetByStatus(String $status): mixed
    {
        return $this->repository->getByStatus($status);
    }
}
