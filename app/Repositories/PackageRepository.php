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

    public function getPackages($limit){
        return $this->model->latest()->paginate($limit);
    }

    public function getPackagePay($id){
        return $this->model
        ->where('id', $id)
        ->first();
    }

}
