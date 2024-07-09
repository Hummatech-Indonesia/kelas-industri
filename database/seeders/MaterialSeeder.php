<?php

namespace Database\Seeders;

use App\Models\Devision;
use App\Models\SubMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material = \App\Models\Material::create([
            'title' => "Tester",
            'description' => 'Materi untuk seleksi siswa pradaftar',
            'generation_id' => 10,
            'devision_id' => Devision::first()->id
        ]);

        SubMaterial::create([
            'title' => 'Tester',
            'material_id' => $material->id,
            'description' => 'Materi untuk seleksi siswa pradaftar',
        ]);
    }
}
