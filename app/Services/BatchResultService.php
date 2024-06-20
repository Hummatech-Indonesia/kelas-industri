<?php

namespace App\Services;

use App\Models\BatchResult;
use App\Traits\Results\{CalculateDistanceTrait,
    EarlyDataTrait,
    IdealSolutionTrait,
    NormalizeXnTrait,
    NormalizeYijTrait,
    PreferenceTrait,
    RelativeWeightTrait};

class BatchResultService
{
    use EarlyDataTrait, NormalizeXnTrait, RelativeWeightTrait, NormalizeYijTrait, IdealSolutionTrait, CalculateDistanceTrait, PreferenceTrait;

    /**
     * Handle Update batch ranks
     *
     * @param string $id
     * @param array $topsis
     *
     * @return void
     */

    public function handleUpdateBatchRanks(string $id, array $topsis): void
    {

        $preferences = $topsis['preference_datas'];
        arsort($preferences);

        $iteration = 1;

        foreach ($preferences as $index => $value) {

            BatchResult::query()
                ->create([
                    'batch_id' => $id,
                    'alternative_id' => $index,
                    'rank' => $iteration,
                    'final_score' => $value
                ]);

            $iteration++;
        }
    }
}
