@extends('layouts.app')
<title>Agregar Anuncio</title>
@section('content')
<div class="container">
    <h1>Agregar Anuncio</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para crear el anuncio -->
    <form action="{{ route('anuncios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" class="form-control bg-secondary text-light border-0" required maxlength="150">
        </div>

        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje:</label>
            <textarea name="mensaje" class="form-control bg-secondary text-light border-0" rows="4" required maxlength="500"></textarea>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
            <input type="date" name="fecha_inicio" class="form-control bg-secondary text-light border-0" required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de Fin:</label>
            <input type="date" name="fecha_fin" class="form-control bg-secondary text-light border-0" required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
        </div>

        <button type="submit" class="btn btn-success">Guardar Anuncio</button>
        <a href="{{ route('gest_admin.manager')}}" class="btn btn-danger mx-2" >Cancelar</a>
    </form>
</div>
@endsection
