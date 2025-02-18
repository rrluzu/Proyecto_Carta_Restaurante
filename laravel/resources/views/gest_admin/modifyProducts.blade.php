@extends('layouts.app')
<title>Editar Producto</title>
@section('content')
<div class="container">
    <h1>Editar Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.actualizar', $producto->id) }}" method="POST" enctype="multipart/form-data" class="bg-dark text-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control bg-secondary text-light border-0" value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control bg-secondary text-light border-0" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio (€):</label>
            <input type="number" name="precio" class="form-control bg-secondary text-light border-0" value="{{ old('precio', $producto->precio) }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría:</label>
            <select name="categoria_id" class="form-control bg-secondary text-light border-0" required>
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id_categorias }}" {{ $categoria->id_categorias == $producto->categoria_id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label ">Imagen:</label>
            <input type="file" name="imagen" class="form-control bg-secondary text-light border-0" accept="image/*" required>
        </div>

        <div class="mb-3">
            <img src="{{ $producto->getFirstMediaUrl('imagenes') }}" alt="Imagen actual" class="img-fluid" style="max-height: 150px; border-radius: 10px;">
        </div>

        <button type="submit" class="btn btn-success mb-5">Guardar Cambios</button>
        <a href="{{ route('gest_admin.manager') }}" class="btn btn-danger mx-2 mb-5">Cancelar</a>
    </form>
</div>
@endsection
