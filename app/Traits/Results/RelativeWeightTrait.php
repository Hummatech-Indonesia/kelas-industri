<?php

namespace App\Traits\Results;

use App\Models\AlternativeCriteria;

trait RelativeWeightTrait
{

    /**
     * Handle Relative weight rij from dataset.
     *
     * @param array $XnArray
     * @param string $batch_id
     * @return array
     */

    public function handleRelativeWeight(array $XnArray, string $batch_id): array
    {
        $RijArray = [];

        $alternativeCriteria = AlternativeCriteria::query()
            ->where('batch_id', $batch_id)
            ->oldest('id')
            ->get();

        foreach ($alternativeCriteria as $datas) {
            $RijArray[$datas->criteria_id][$datas->alternative_id] = round($datas->score / $XnArray[$datas->criteria_id], 5);
        }
        return $RijArray;
    }

}
