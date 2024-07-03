<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'generation_id' => $this->faker->numberBetween(1, 3),
            'school_id' => \App\Models\User::whereHas('roles', function($q) {
                return $q->where('name', 'school');
            })->fist()->id,
            'name' => $this->faker->word,
            'devision_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
