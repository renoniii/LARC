<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Limpieza y desinfección'],
            ['nombre' => 'Protección y utensilios de limpieza'],
            ['nombre' => 'Bolsas plásticas y residuos'],
            ['nombre' => 'Papelería sanitaria e institucional'],
            ['nombre' => 'Productos de cafetería y cocina'],
            ['nombre' => 'Misceláneos'],
            ['nombre' => 'Mobiliario para residuos'],
        ]);
    }
}
