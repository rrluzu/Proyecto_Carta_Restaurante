<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Anuncios;
use Carbon\Carbon; // Importar Carbon para manejar fechas

class IndexController extends Controller
{
    // Controlador de ruta para index
    public function index(Request $request)
    {
        $hoy = Carbon::now()->format('Y-m-d'); // Obtener la fecha actual

        // Filtrar anuncios activos (entre fecha_inicio y fecha_fin)
        $anunciosActivos = Anuncios::where('fecha_inicio', '<=', $hoy)
                                ->where('fecha_fin', '>=', $hoy)
                                ->get();

        // Obtener la consulta de búsqueda
        $buscar = $request->input('buscar');

        // Filtrar productos según la búsqueda
        $categorias = Categoria::with(['productos' => function ($query) use ($buscar) {
            if ($buscar) {
                $query->where('nombre', 'LIKE', "%$buscar%");
            }
        }])->get();

        return view('index', compact('categorias', 'anunciosActivos'));
    }


    // Controlador de ruta para la vista del administrador
    public function managerAdmin() {
        $categorias = Categoria::orderBy('id_categorias', 'asc')->get();
        $productos = Producto::with('categoria')->get();
        $anuncios = Anuncios::all();

        return view('gest_admin.manager', compact('categorias', 'productos', 'anuncios'));
    }
}
