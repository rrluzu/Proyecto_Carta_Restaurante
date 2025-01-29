<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Entrantes',
                'descripcion' => 'Pequeñas porciones de producto de la casa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Platos Principales',
                'descripcion' => 'Platos fuertes para el almuerzo o la cena',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Postres',
                'descripcion' => 'Dulces elaboradas a mano para el final de la comida',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Bebidas',
                'descripcion' => 'Refrescos, jugos y otras opciones para acompañar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
