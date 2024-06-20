<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

/**
 * Import Model for Excel
 */
class ImportModelHelper
{

    /**
     * Import Model for query to database
     * @param Model $model
     * @return array
     */

    public static function queryModel(Model $model): array
    {
        return $model::query()
            ->where('status',1)
            ->oldest('id')
            ->pluck('id')
            ->toArray();
    }
}
