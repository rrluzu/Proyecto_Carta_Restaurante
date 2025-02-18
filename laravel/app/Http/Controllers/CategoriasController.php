<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{

    // Controlador para la Vista de EDICION de categorias como administrador
    public function crearCategorias()
    {
        $categoria = new Categoria(); // Crear una nueva instancia de la categoría
        return view('gest_admin.createCategories', compact('categoria'));
    }

    public function insertarCategorias(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
        ]);

        // Comprobar si ya existe una categoría con el mismo nombre (sin distinción de mayúsculas y minúsculas)
        $existe = Categoria::whereRaw('LOWER(nombre) = ?', [strtolower($request->nombre)])->exists();

        if ($existe) {
            return redirect()->back()->with('danger', 'Categoría ya existente');;
        }

        // Crear una nueva categoría con los datos recibidos
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        // Redirigir a otra página o devolver una respuesta
        return redirect()->route('gest_admin.manager')->with('success', 'Categoría guardada exitosamente');
    }

    // Controlador para la EDICION de productos como administrador
    public function editarCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('gest_admin.modifyCategories', compact('categoria'));
    }

    public function actualizarCategorias(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $id . ',id_categorias',
            'descripcion' => 'required|string|max:500',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('gest_admin.manager')->with('success', 'Categoría actualizada exitosamente');
    }

    public function eliminarCategoria($id)
    {
        // Buscar la categoría por su ID y eliminarla
        $categoria = Categoria::findOrFail($id);

        // Verificar si la categoría tiene productos asociados
        if ($categoria->productos()->exists()) {
            return redirect()->route('gest_admin.manager')->with('danger', 'No puedes eliminar esta categoría porque tiene productos asociados. Elimina los productos primero.');
        }
        
        $categoria->delete();

        // Redirigir a una página con un mensaje de éxito
        return redirect()->route('gest_admin.manager')->with('success', 'Categoría eliminada exitosamente');
    }

}
