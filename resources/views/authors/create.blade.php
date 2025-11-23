@extends('layout')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">➕ Agregar Nuevo Autor</h2>

    <form action="{{ route('authors.store') }}" method="POST" class="w-75 mx-auto">
        @csrf

        {{-- Nombre del Autor --}}
        <div class="mb-3">
            <label for="nombres_autor" class="form-label">Nombre del Autor</label>
            <input type="text" name="nombres_autor" class="form-control" required placeholder="Ej. Gabriel Jovanni">
        </div>

        {{-- Apellido del Autor --}}
        <div class="mb-3">
            <label for="apellidos_autor" class="form-label">Apellido del Autor</label>
            <input type="text" name="apellidos_autor" class="form-control" required placeholder="Ej. García Márquez">
        </div>

        {{-- Nacionalidad --}}
        <div class="mb-3">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" name="nacionalidad" class="form-control" placeholder="Ej. Colombiana">
        </div>

        {{-- Fecha de Nacimiento --}}
        <div class="mb-3">
    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
    <input type="date" name="fecha_nacimiento" class="form-control">
</div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar Autor</button>
        </div>
    </form>
</div>
@endsection
