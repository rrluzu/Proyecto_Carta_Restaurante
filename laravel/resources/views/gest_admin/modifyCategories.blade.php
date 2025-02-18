@extends('layouts.app')
<title>Editar Categoría</title>
@section('content')
<div class="container">
    <h1>Editar Categoría</h1>
    <form action="{{ route('categorias.actualizar', $categoria->id_categorias) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Categoría:</label>
            <input type="text" name="nombre" class="form-control bg-secondary text-light border-0" value="{{ $categoria->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control bg-secondary text-light border-0" required>{{ $categoria->descripcion }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
        <a href="{{ route('gest_admin.manager') }}" class="btn btn-danger mx-2">Cancelar</a>
    </form>

</div>
@endsection