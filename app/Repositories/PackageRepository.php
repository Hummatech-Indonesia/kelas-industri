<?php

namespace App\Repositories;

use App\Models\Packages;

class PackageRepository extends BaseRepository
{
    private Packages $package;

    public function __construct(Packages $package)
    {
        $this->model= $package;
    }

    public function getPackages($limit, $request){
        return $this->model->query()
        ->when($request->status == 'individual', function($q) use ($request){
            $q->where('status', $request->status);
        })
        ->when($request->status == 'collective', function($q) use ($request){
            $q->where('status', $request->status);
        })
        ->latest()
        ->paginate($limit);
    }

    public function getPackagePay($id){
        return $this->model
        ->where('id', $id)
        ->first();
    }

    public function getByStatus(String $status){
        return $this->model->query()
        ->where('status', $status)
        ->latest()
        ->get();
    }
}
