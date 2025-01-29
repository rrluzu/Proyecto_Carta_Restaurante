<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            [
                'nombre' => '',
                'descripcion' => '',
                'precio' => '',
                'imagen' => '',
                'categoria' => '1', //Entrantes
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => '',
                'descripcion' => '',
                'precio' => '',
                'imagen' => '',
                'categoria' => '2', //Platos principales
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => '',
                'descripcion' => '',
                'precio' => '',
                'imagen' => '',
                'categoria' => '3', //Postres
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => '',
                'descripcion' => '',
                'precio' => '',
                'imagen' => '',
                'categoria' => '4', //Bebidas
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
