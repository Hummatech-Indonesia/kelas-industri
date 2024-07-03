<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Devision;
use App\Models\Classroom;
use App\Models\Generation;
use App\Models\StudentClassroom;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            SchoolYearSeeder::class,
            GenerationSeeder::class,
        ]);
        Devision::create(['name' => 'Web']);
        Classroom::create([
            'generation_id' => Generation::first()->id,
            'school_id' => User::whereHas('roles', function ($query) {return $query->where('name', 'school');})->first()->id,
            'devision_id' => Devision::first()->id,
            'name' => 'Kelas 10'
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
