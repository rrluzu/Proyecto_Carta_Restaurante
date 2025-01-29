<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('index');
})->name('index');

// ? Ruta middleware que proteje las demás rutas importantes
Route::middleware('auth')->group(function(){

    // ? Ruta de la vista del administrador
    Route::get('gest_admin/manager', function () {
        return view('gest_admin.manager');
    })->name('gest_admin.manager');
});

Auth::routes();

