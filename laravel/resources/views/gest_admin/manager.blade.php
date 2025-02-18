@extends('layouts.app')
<title>Panel de Administrador</title>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif
            <div class="card text-white bg-dark">
                <div class="card-header">
                    <span class="h2">Listado de Productos</span>
                    <a href="{{route('products.create')}}" class="btn btn-success float-end">Agregar Producto</a>
                </div>
                <div class="card-body">
                @if ($productos->isEmpty())
                    <p>No hay productos registrados.</p>
                @else
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Categoría</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $index => $producto)
                                <tr class="{{ $index >= 4 ? 'd-none extra-producto' : '' }}">
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>{{ $producto->precio }}€</td>
                                    <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                                    <td>
                                        <img src="{{ $producto->getFirstMediaUrl('imagenes', 'thumb') }}" alt="{{ $producto->nombre }}" width="100">
                                    </td>
                                    <td>
                                        <a href="{{ route('productos.editar', $producto->id) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('productos.eliminar', $producto->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Botón para mostrar más/menos -->
                    @if ($productos->count() > 4)
                        <div class="text-center mt-3">
                            <button id="toggleProductos" class="btn btn-dark">Mostrar más</button>
                        </div>
                    @endif
                @endif
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    <span class="h2">Listado de Categorías</span>
                    <a href="{{ route('categories.create') }}" class="btn btn-success float-end">Agregar Categoría</a>
                </div>
                <div class="card-body">
                @if ($categorias->isEmpty())
                    <p>No hay categorías registradas.</p>
                @else
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $index => $categoria)
                            <tr class="{{ $index >= 4 ? 'd-none extra-categoria' : '' }}">
                                <td>{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>
                                    <!-- Enlace a la vista de edición de cada categoría -->
                                    <a href="{{ route('categorias.editar', $categoria->id_categorias) }}" class="btn btn-warning">Editar</a>
                                    <!-- Formulario para Eliminar Categoría -->
                                    <form action="{{ route('categorias.eliminar', $categoria->id_categorias) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <!-- Botón con confirmación antes de eliminar -->
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    <!-- Botón para mostrar más/menos -->
                    @if ($categorias->count() > 4)
                        <div class="text-center mt-3">
                            <button id="toggleCategorias" class="btn btn-dark">Mostrar más</button>
                        </div>
                    @endif
                @endif
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3 mb-5">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    <span class="h2">Listado de Anuncios</span>
                    <a href="{{ route('anuncios.create') }}" class="btn btn-success float-end">Agregar Anuncio</a>
                </div>
                <div class="card-body">
                @if ($anuncios->isEmpty())
                    <p>No hay anuncios registrados.</p>
                @else
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Mensaje</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Fin</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($anuncios as $index => $anuncio)
                            <tr class="{{ $index >= 4 ? 'd-none extra-anuncio' : '' }}">
                                <td>{{ $anuncio->titulo }}</td>
                                <td>{{ $anuncio->mensaje }}</td>
                                <td>{{ $anuncio->fecha_inicio }}</td>
                                <td>{{ $anuncio->fecha_fin }}</td>
                                <td>
                                    <!-- Enlace para Modificar -->
                                    <a href="{{ route('anuncios.editar', $anuncio->id) }}" class="btn btn-warning mb-2">Editar</a>

                                    <!-- Formulario para Eliminar -->
                                    <form action="{{ route('anuncios.eliminar', $anuncio->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('¿Estás seguro de que deseas eliminar este anuncio?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Botón para mostrar más/menos -->
                    @if ($anuncios->count() > 4)
                        <div class="text-center mt-3">
                            <button id="toggleAnuncios" class="btn btn-dark">Mostrar más</button>
                        </div>
                    @endif
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function toggleItems(idBoton, clase) {
            const btnToggle = document.getElementById(idBoton);
            const extraItems = document.querySelectorAll(`.${clase}`);

            if (btnToggle && extraItems.length > 0) {
                btnToggle.addEventListener('click', function () {
                    const isHidden = extraItems[0].classList.contains('d-none');
                    extraItems.forEach(el => el.classList.toggle('d-none', !isHidden));
                    btnToggle.textContent = isHidden ? 'Mostrar menos' : 'Mostrar más';
                });
            }
        }

        toggleItems('toggleProductos', 'extra-producto');
        toggleItems('toggleCategorias', 'extra-categoria');
        toggleItems('toggleAnuncios', 'extra-anuncio');
    });
</script>
