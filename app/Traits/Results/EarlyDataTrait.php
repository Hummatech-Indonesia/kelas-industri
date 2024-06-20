<?php

namespace App\Traits\Results;

use App\Models\Alternative;
use App\Models\Criteria;

trait EarlyDataTrait
{
    /**
     * Handle get all criterias batch data.
     *
     * @param string $batch_id
     * @return object
     */

    public function handleCriterias(string $batch_id): object
    {
        return Criteria::query()
            ->with('alternative_criterias', function ($query) use ($batch_id) {
                return $query->where('batch_id', $batch_id);
            })
            ->whereRelation('alternative_criterias.alternative','batch_id',$batch_id)
            ->whereHas('alternative_criterias')
            ->oldest('id')
            ->get();
    }

    /**
     * Handle get all alternatives batch data.
     *
     * @param string $batch_id
     * @return object
     */

    public function handleAlternatives(string $batch_id): object
    {
        return Alternative::query()
            ->with('alternative_criterias', function ($query) use ($batch_id) {
                return $query->where('batch_id', $batch_id);
            })
            ->whereHas('alternative_criterias')
            ->where('batch_id', $batch_id)
            ->oldest('id')
            ->get();
    }

}
