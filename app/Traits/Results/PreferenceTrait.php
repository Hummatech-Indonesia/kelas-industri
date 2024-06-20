<?php

namespace App\Traits\Results;

trait PreferenceTrait
{

    /**
     * Handle square root for xn.
     *
     * @param array $distance_datas
     * @param string $batch_id
     *
     * @return array
     */

    public function handlePreferenceDatas(array $distance_datas, string $batch_id): array
    {
        $preferences = [];

        $alternatives = $this->handleAlternatives($batch_id)
            ->pluck('id')
            ->toArray();


        foreach ($alternatives as $alternative) {
            $dPlus = $distance_datas['dPlus'][$alternative];
            $dMinus = $distance_datas['dMinus'][$alternative];

            $preferences[$alternative] = round($dMinus / ($dPlus + $dMinus), 4);
        }

        return $preferences;

    }
}
