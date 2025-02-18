<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = [
            // Entrantes
            [
                'nombre' => 'Tortilla de Patata',
                'descripcion' => 'Clásica tortilla española con patatas y huevo.',
                'precio' => 8.50,
                'imagen' => 'tortilla_patata.jpg',  // Imagen predefinida
                'categoria' => '1', // Entrantes
            ],
            [
                'nombre' => 'Croquetas de Jamón',
                'descripcion' => 'Croquetas crujientes rellenas de jamón serrano.',
                'precio' => 6.00,
                'imagen' => 'croquetas_jamon.jpg',  // Imagen predefinida
                'categoria' => '1', // Entrantes
            ],
            [
                'nombre' => 'Gazpacho Andaluz',
                'descripcion' => 'Sopa fría de tomate, pepino, pimiento y ajo.',
                'precio' => 7.00,
                'imagen' => 'gazpacho_andaluz.jpg',  // Imagen predefinida
                'categoria' => '1', // Entrantes
            ],
            [
                'nombre' => 'Pimientos de Padrón',
                'descripcion' => 'Pimientos fritos con sal gruesa, algunos pican.',
                'precio' => 5.50,
                'imagen' => 'pimientos_padron.jpg',  // Imagen predefinida
                'categoria' => '1', // Entrantes
            ],
            [
                'nombre' => 'Ensaladilla Rusa',
                'descripcion' => 'Ensalada de patatas, zanahoria, guisantes y mayonesa.',
                'precio' => 6.50,
                'imagen' => 'ensaladilla_rusa.jpg',  // Imagen predefinida
                'categoria' => '1', // Entrantes
            ],
        
            // Platos principales
            [
                'nombre' => 'Paella Valenciana',
                'descripcion' => 'Arroz con mariscos, pollo y verduras.',
                'precio' => 15.00,
                'imagen' => 'paella_valenciana.jpg',  // Imagen predefinida
                'categoria' => '2', // Platos principales
            ],
            [
                'nombre' => 'Fabada Asturiana',
                'descripcion' => 'Guiso a base de fabas, chorizo, morcilla y tocino.',
                'precio' => 14.00,
                'imagen' => 'fabada_asturiana.jpg',  // Imagen predefinida
                'categoria' => '2', // Platos principales
            ],
            [
                'nombre' => 'Cochinillo Asado',
                'descripcion' => 'Cochinillo tierno asado con piel crujiente.',
                'precio' => 18.00,
                'imagen' => 'cochinillo_asado.jpg',  // Imagen predefinida
                'categoria' => '2', // Platos principales
            ],
            [
                'nombre' => 'Merluza a la Gallega',
                'descripcion' => 'Pescado con patatas, pimentón y aceite de oliva.',
                'precio' => 13.00,
                'imagen' => 'merluza_gallega.jpg',  // Imagen predefinida
                'categoria' => '2', // Platos principales
            ],
            [
                'nombre' => 'Ropa Vieja',
                'descripcion' => 'Guiso de carne desmenuzada con garbanzos y tomate.',
                'precio' => 12.50,
                'imagen' => 'ropa_vieja.jpg',  // Imagen predefinida
                'categoria' => '2', // Platos principales
            ],
        
            // Postres
            [
                'nombre' => 'Tarta de Santiago',
                'descripcion' => 'Bizcocho de almendra con un toque de limón.',
                'precio' => 4.50,
                'imagen' => 'tarta_santiago.jpg',  // Imagen predefinida
                'categoria' => '3', // Postres
            ],
            [
                'nombre' => 'Churros con Chocolate',
                'descripcion' => 'Churros fritos acompañados de chocolate espeso.',
                'precio' => 5.00,
                'imagen' => 'churros_chocolate.png',  // Imagen predefinida
                'categoria' => '3', // Postres
            ],
            [
                'nombre' => 'Flan Casero',
                'descripcion' => 'Flan de huevo con caramelo líquido.',
                'precio' => 3.50,
                'imagen' => 'flan_casero.jpg',  // Imagen predefinida
                'categoria' => '3', // Postres
            ],
            [
                'nombre' => 'Arroz con Leche',
                'descripcion' => 'Arroz cocido con leche, azúcar y canela.',
                'precio' => 3.80,
                'imagen' => 'arroz_con_leche.jpg',  // Imagen predefinida
                'categoria' => '3', // Postres
            ],
            [
                'nombre' => 'Tocinillo de Cielo',
                'descripcion' => 'Postre a base de yemas de huevo, azúcar y agua.',
                'precio' => 4.00,
                'imagen' => 'tocinillo_cielo.jpg',  // Imagen predefinida
                'categoria' => '3', // Postres
            ],
        
            // Bebidas
            [
                'nombre' => 'Sangría',
                'descripcion' => 'Vino tinto, frutas y un toque de licor.',
                'precio' => 10.00,
                'imagen' => 'sangria.jpg',  // Imagen predefinida
                'categoria' => '4', // Bebidas
            ],
            [
                'nombre' => 'Cerveza Estrella Galicia',
                'descripcion' => 'Cerveza lager de sabor suave y refrescante.',
                'precio' => 2.50,
                'imagen' => 'estrella_galicia.jpg',  // Imagen predefinida
                'categoria' => '4', // Bebidas
            ],
            [
                'nombre' => 'Vino Albariño',
                'descripcion' => 'Vino blanco gallego de sabor afrutado y fresco.',
                'precio' => 15.00,
                'imagen' => 'vino_albarino.jpg',  // Imagen predefinida
                'categoria' => '4', // Bebidas
            ],
            [
                'nombre' => 'Café Cortado',
                'descripcion' => 'Café espresso con un toque de leche.',
                'precio' => 1.80,
                'imagen' => 'cafe_cortado.jpg',  // Imagen predefinida
                'categoria' => '4', // Bebidas
            ],
            [
                'nombre' => 'Horchata de Chufa',
                'descripcion' => 'Bebida refrescante hecha a base de chufa.',
                'precio' => 3.00,
                'imagen' => 'horchata_chufa.jpg',  // Imagen predefinida
                'categoria' => '4', // Bebidas
            ],
        ];

        foreach ($productos as $productoData) {
            // Crear el producto sin imagen
            $producto = Producto::create([
                'nombre' => $productoData['nombre'],
                'descripcion' => $productoData['descripcion'],
                'precio' => $productoData['precio'],
                'categoria_id' => $productoData['categoria'],
                'imagen' => $productoData['imagen'], // Guardamos el nombre de la imagen
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Asociar la imagen con Spatie Media Library
            $producto->addMedia(storage_path("app/public/imagenes_prueba/{$productoData['imagen']}"))
                     ->toMediaCollection('imagenes'); // 'imagenes' es el nombre de la colección

            // Actualizar el campo imagen en la base de datos con el nombre de la imagen
            $producto->imagen = $productoData['imagen']; // Este nombre de imagen es el que usará la media library
            $producto->save();
        }
    }
}
