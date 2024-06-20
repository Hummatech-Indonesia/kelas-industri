<?php

namespace App\Repositories\Spk;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * Handle model initialization.
     *
     * @var Model $model
     */

    public Model $model;
}
