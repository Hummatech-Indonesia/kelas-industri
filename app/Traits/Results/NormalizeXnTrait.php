<?php

namespace App\Traits\Results;

use App\Models\AlternativeCriteria;
use Illuminate\Support\Facades\DB;

trait NormalizeXnTrait
{

    /**
     * Handle square root for xn.
     *
     * @param string $batch_id
     *
     * @return array
     */

    public function handleXnDatas(string $batch_id): array
    {
        $criteriaValues = $this->handleGroupCriterias($batch_id);

        $XnArray = [];

        foreach ($criteriaValues as $item) {
            $criteriaId = $item->criteria_id;

            $values = AlternativeCriteria::query()
                ->where(['batch_id' => $batch_id, 'criteria_id' => $criteriaId])
                ->pluck('score')
                ->toArray();

            $sumOfSquares = 0;

            foreach ($values as $value) $sumOfSquares += pow($value, 2);

            $XnArray[$criteriaId] = sqrt($sumOfSquares);
        }

        return $XnArray;
    }

    /**
     * Handle group criterias for xn.
     *
     * @param string $batch_id
     * @return object|array
     */

    public function handleGroupCriterias(string $batch_id): object|array
    {
        return AlternativeCriteria::query()
            ->select('criteria_id', DB::raw('SUM(score) as total_score'))
            ->where('batch_id', $batch_id)
            ->groupBy('criteria_id')
            ->get();

    }
}
