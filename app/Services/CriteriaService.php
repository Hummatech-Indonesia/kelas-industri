<?php

namespace App\Services;

class CriteriaService
{
    /**
     * Handle check weight sum.
     *
     * @param int $weight
     * @param int $totalSum
     * @return bool
     */

    public function handleCheckWeight(int $weight, int $totalSum): bool
    {
        return !((($weight + $totalSum) > 100));
    }

    /**
     * Handle check valid weight sum.
     *
     * @param int $totalSum
     * @return bool
     */

    public function handleValidWeight(int $totalSum): bool
    {
        return $totalSum == 100;
    }
}
