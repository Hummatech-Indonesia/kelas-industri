<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Generation::factory()->count(1)->create();
        \App\Models\Generation::create([
            'id' => 10,
            'school_year_id' => 1,
            'generation' => 'Kelas Tester'
        ]);
    }
}
