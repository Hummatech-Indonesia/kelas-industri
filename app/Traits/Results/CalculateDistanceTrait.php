<?php

namespace App\Traits\Results;

trait CalculateDistanceTrait
{
    /**
     * Handle for yij data.
     *
     * @param array $yij_datas
     * @param array $ideal_solution_datas
     * @param string $batch_id
     *
     * @return array
     */

    public function handleEucledianDistance(array $yij_datas, array $ideal_solution_datas, string $batch_id): array
    {
        $dPlus = [];
        $dMinus = [];

        
        $alternatives = $this->handleAlternatives($batch_id)->toArray();
        $criterias = $this->handleCriterias($batch_id)->toArray();

        foreach ($alternatives as $alternative) {
            $alternative_id = $alternative['id'];

            $dPlus[$alternative_id] = 0;
            $dMinus[$alternative_id] = 0;

            foreach ($criterias as $criteria) {
                $criteria_id = $criteria['id'];

                $yij = $yij_datas[$criteria_id][$alternative_id];
                $aPlus = $ideal_solution_datas['idealPositive'][$criteria_id];
                $aMinus = $ideal_solution_datas['idealNegative'][$criteria_id];


                $dPlus[$alternative_id] += pow($yij - $aPlus, 2);
                $dMinus[$alternative_id] += pow($yij - $aMinus, 2);
            }

            $dPlus[$alternative_id] = round(sqrt($dPlus[$alternative_id]), 5);
            $dMinus[$alternative_id] = round(sqrt($dMinus[$alternative_id]), 5);
        }

        return [
            'dPlus' => $dPlus,
            'dMinus' => $dMinus
        ];

    }
}
