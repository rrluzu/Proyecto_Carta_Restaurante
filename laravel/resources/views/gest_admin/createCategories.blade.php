@extends('layouts.app')
<title>Agregar Categoría</title>
@section('content')
<div class="container">
    <h1>Crear Categoría</h1>
    @if(session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="mb-3">
                <label for="nombre">Nombre de la Categoría:</label>
                <input type="text" name="nombre" class="form-control bg-secondary text-light border-0" value="{{ old('nombre', $categoria->nombre) }}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" class="form-control bg-secondary text-light border-0" required>{{ $categoria->descripcion }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Guardar Categoría</button>
        <a href="{{ route('gest_admin.manager') }}" class="btn btn-danger mx-2">Cancelar</a>
    </form>
</div>
@endsection