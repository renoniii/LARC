<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Jabón Industrial',
                'descripcion' => 'Limpieza profunda con fórmula profesional.',
                'precio' => 25000,
                'imagen' => 'img/jabon.jpg',
                'categoria_id' => 1, // Limpieza y desinfección
            ],
            [
                'nombre' => 'Guantes de látex',
                'descripcion' => 'Protección desechable para limpieza.',
                'precio' => 7000,
                'imagen' => 'img/jabon.jpg',
                'categoria_id' => 2, // Protección y utensilios
            ],
            [
                'nombre' => 'Bolsa Negra 55 Galones',
                'descripcion' => 'Alta resistencia para residuos pesados.',
                'precio' => 1500,
                'imagen' => 'img/jabon.jpg',
                'categoria_id' => 3, // Bolsas y residuos
            ],
            [
                'nombre' => 'Papel Higiénico Jumbo',
                'descripcion' => 'Rollo institucional de larga duración.',
                'precio' => 9000,
                'imagen' => 'img/jabon.jpg',
                'categoria_id' => 4, // Papelería sanitaria
            ],
            [
                'nombre' => 'Vasos térmicos x25 und.',
                'descripcion' => 'Vasos descartables para bebidas calientes.',
                'precio' => 5500,
                'imagen' => 'img/jabon.jpg',
                'categoria_id' => 5, // Cafetería
            ],
            [
                'nombre' => 'Cinta adhesiva gruesa',
                'descripcion' => 'Ideal para embalaje industrial.',
                'precio' => 4000,
                'imagen' => 'img/jabon.jpg',
                'categoria_id' => 6, // Misceláneos
            ],
            [
                'nombre' => 'Contenedor de reciclaje 90L',
                'descripcion' => 'Colores disponibles: verde, azul, rojo.',
                'precio' => 68000,
                'imagen' => 'img/jabon.jpg',
                'categoria_id' => 7, // Mobiliario
            ],
        ]);
    }
}
