<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AnunciosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ? Ruta index donde va la carta del restaurante
Route::get('/', 'IndexController@index'
)->name('index');

// ? Ruta middleware que proteje las demás rutas importantes
Route::middleware('auth')->group(function(){

    //! RUTA PARA MOSTRAR LA VISTA DEL ADMINISTRADOR
    // ? Ruta de la vista del administrador
    Route::get('gest_admin/manager', 'IndexController@managerAdmin'
    )->name('gest_admin.manager');

    //! RUTAS DE CATEGORIAS
    // ? Ruta de la vista para crear las categorias
    Route::get('gest_admin/createCategories', 'CategoriasController@crearCategorias'
    )->name('categories.create');
    
    //? Ruta para guardar las categorias después de ser creadas
    Route::post('gest_admin/createCategories', 'CategoriasController@insertarCategorias'
    )->name('categories.store');
    
    //? Ruta para obtener la categoría a editar
    Route::get('gest_admin/modifyCategories/{id}', 'CategoriasController@editarCategoria'
    )->name('categorias.editar');

    //? Ruta para guardar los cambios de la categoría editada
    Route::put('gest_admin/modifyCategories/{id}', 'CategoriasController@actualizarCategorias'
    )->name('categorias.actualizar');

    //? Ruta para eliminar una categoría
    Route::delete('gest_admin/deleteCategory/{id}', 'CategoriasController@eliminarCategoria'
    )->name('categorias.eliminar');
    
    //! RUTAS DE PRODUCTOS
    Route::get('gest_admin/createProducts', 'ProductosController@crearProductos'
    )->name('products.create');
    
    Route::post('gest_admin/createProducts', 'ProductosController@insertarProductos'
    )->name('products.store');

    Route::get('gest_admin/modifyProducts/{id}', 'ProductosController@editarProducto'
    )->name('productos.editar');

    Route::put('gest_admin/modifyProducts/{id}', 'ProductosController@actualizarProducto'
    )->name('productos.actualizar');

    Route::delete('gest_admin/deleteProducts/{id}', 'ProductosController@eliminarProducto'
    )->name('productos.eliminar');

    //! RUTAS DE ANUNCIOS
    Route::get('gest_admin/createAnnouncements', 'AnunciosController@crearAnuncios'
    )->name('anuncios.create');

    Route::post('gest_admin/createAnnouncements', 'AnunciosController@insertarAnuncios'
    )->name('anuncios.store');

    Route::get('gest_admin/modifyAnnouncements/{id}', 'AnunciosController@editarAnuncios'
    )->name('anuncios.editar');

    Route::put('gest_admin/modifyAnnouncements/{id}', 'AnunciosController@actualizarAnuncios'
    )->name('anuncios.actualizar');

    Route::delete('gest_admin/deleteAnnouncements/{id}', 'AnunciosController@eliminarAnuncios'
    )->name('anuncios.eliminar');
});

Auth::routes();

