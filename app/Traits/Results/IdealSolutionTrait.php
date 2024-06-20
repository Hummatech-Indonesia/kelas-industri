<?php

namespace App\Traits\Results;

use App\Enums\CriteriaTypeEnum;
use App\Models\Criteria;

trait IdealSolutionTrait
{
    /**
     * Handle for yij data.
     *
     * @param array $yij_datas
     * @param string $batch_id
     *
     * @return array
     */

    public function handleIdealSolution(array $yij_datas, string $batch_id): array
    {
        $idealPositive = [];
        $idealNegative = [];

        $type = Criteria::query()
            ->with('alternative_criterias', function ($query) use ($batch_id) {
                return $query->where('batch_id', $batch_id);
            })
            ->oldest('id')
            ->pluck('type', 'id')
            ->toArray();

        foreach ($yij_datas as $criteria => $values) {
            if (CriteriaTypeEnum::BENEFIT->value == $type[$criteria]) {
                $idealPositive[$criteria] = number_format(max($values), 5, '.', '');
            } else {
                $idealPositive[$criteria] = number_format(min($values), 5, '.', '');
            }
        }
        foreach ($yij_datas as $criteria => $values) {
            if (CriteriaTypeEnum::BENEFIT->value == $type[$criteria]) {
                $idealNegative[$criteria] = number_format(min($values), 5, '.', '');
            } else {
                $idealNegative[$criteria] = number_format(max($values), 5, '.', '');
            }
        }

        return [
            'idealPositive' => $idealPositive,
            'idealNegative' => $idealNegative
        ];

    }
}
