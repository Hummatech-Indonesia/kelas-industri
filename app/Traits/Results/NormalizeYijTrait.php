<?php

namespace App\Traits\Results;

trait NormalizeYijTrait
{

    /**
     * Handle for yij data.
     *
     * @param array $relative_weight_datas
     * @param string $batch_id
     *
     * @return array
     */

    public function handleYijDatas(array $relative_weight_datas, string $batch_id): array
    {
        $weights = $this->handleCriterias($batch_id)->pluck('weight')->toArray();

        $yij_datas = [];


        foreach ($relative_weight_datas as $criteria => $rij_datas) {
            foreach ($rij_datas as $alternative => $rij) {
                $yij_datas[$criteria][$alternative] = round($rij * ($weights[$criteria - 1] / 100), 5);
            }
        }

        return $yij_datas;
    }
}
