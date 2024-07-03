<?php

namespace Database\Factories;

use App\Models\SchoolYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Generation>
 */
class GenerationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $schoolyear = SchoolYear::first();
        info($schoolyear);
        return [
            'school_year_id' => $schoolyear->id,
            'generation' => 'Kelas 10'
        ];
    }
}
