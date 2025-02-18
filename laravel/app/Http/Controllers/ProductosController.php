<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductosController extends Controller
{
    // Controlador para la Vista de EDICION de productos como administrador
    public function crearProductos(){
        $categorias = Categoria::orderBy('id_categorias', 'asc')->get();
        return view('gest_admin.createProducts', compact('categorias'));
    }

    // Controlador por donde pasarán los datos para posteriormente guardarlos en la BBDD
    public function insertarProductos(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id_categorias', // Asegúrate de que la categoría existe
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de la imagen
        ]);

        // Crear el producto con una imagen predeterminada
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'categoria_id' => $request->categoria_id,
            'imagen' => 'default.jpg', // Imagen predeterminada
        ]);

        // Guardar la imagen usando Spatie Media Library
        if ($request->hasFile('imagen')) {
            $producto->addMedia($request->file('imagen'))
                     ->withResponsiveImages()
                     ->toMediaCollection('imagenes'); // 'imagenes' es el nombre de la colección de medios

            // Actualizar el campo imagen con el nombre de la imagen subida
            $producto->imagen = $request->file('imagen')->getClientOriginalName();
            $producto->save();
        }

        // Redirigir con mensaje de éxito
        return redirect()->route('gest_admin.manager')->with('success', 'Producto agregado correctamente.');
    }

    public function listarProductos()
    {
        $productos = Producto::with('categoria')->get(); // Obtener productos con sus categorías
        return view('gest_admin.manager', compact('productos'));
    }

    public function editarProducto($id)
    {
        // Obtener el producto por su ID
        $producto = Producto::findOrFail($id);
        // Obtener todas las categorías para el selector
        $categorias = Categoria::orderBy('id_categorias', 'asc')->get();

        // Devolver la vista con el producto y las categorías
        return view('gest_admin.modifyProducts', compact('producto', 'categorias'));
    }

    public function actualizarProducto(Request $request, $id)
    {
        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id_categorias', // Asegúrate de que la categoría existe
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de la imagen
        ]);

        // Encontrar el producto por su ID
        $producto = Producto::findOrFail($id);

        // Actualizar los campos del producto
        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'categoria_id' => $request->categoria_id,
        ]);

        // Si el formulario incluye una nueva imagen, guardarla
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior
            $producto->clearMediaCollection('imagenes');
            
            // Añadir la nueva imagen
            $producto->addMedia($request->file('imagen'))
                    ->withResponsiveImages()
                    ->toMediaCollection('imagenes');

            // Actualizar el campo imagen con el nombre de la nueva imagen
            $producto->imagen = $request->file('imagen')->getClientOriginalName();
        }

        // Guardar los cambios
        $producto->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('gest_admin.manager')->with('success', 'Producto actualizado correctamente.');
    }

    public function eliminarProducto($id)
    {
        // Obtener el producto por su ID
        $producto = Producto::findOrFail($id);
        // Eliminar las imágenes asociadas usando Spatie Media Library
        $producto->clearMediaCollection('imagenes');
        // Eliminar el producto de la base de datos
        $producto->delete();
        // Redirigir con mensaje de éxito
        return redirect()->route('gest_admin.manager')->with('success', 'Producto eliminado correctamente.');
    }

}
