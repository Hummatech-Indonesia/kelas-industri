<?php

namespace App\Repositories;

use App\Models\Gallery;
use App\Repositories\GalleryRepository;

class GalleryRepository extends  BaseRepository
{
    public function __construct(Gallery $model)
    {
        $this->model = $model;
    }

    }
