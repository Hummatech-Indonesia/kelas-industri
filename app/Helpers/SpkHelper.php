<?php

namespace App\Helpers;

use App\Models\Criteria;
use App\Models\SchoolYear;
use App\Models\BatchResult;

class SpkHelper
{
    public static function topStudents($batchId){
        $topStudents = BatchResult::query()->where('batch_id', $batchId)->limit(5)->orderBy('rank')->get();

        return $topStudents;
    }

    public static function stats($batchId){
        $criterias = Criteria::with([
            'alternative_criterias' => function ($query) use ($batchId) {
                $query->where('batch_id', $batchId);
            },
        ])
            ->whereHas('alternative_criterias', function ($query) use ($batchId) {
                $query->where('batch_id', $batchId);
            })
            ->get();

            
        $save = collect();
        foreach($criterias as $i => $criteria){
            $score = $criteria->alternative_criterias->pluck('score')->avg();
            $save[$i] = $criteria;
            $save[$i]->avg = $score;
        }

        $criteriaName = $criterias->pluck('name')->toArray();
        $criteriaScore = $criterias->pluck('avg')->toArray();

        foreach($criteriaScore as $i => $score){
            $criteriaScore[$i] = number_format($score, 2, '.', '');
        }
        return [
            'name' => $criteriaName,
            'score' => $criteriaScore
        ];
    }   
}
