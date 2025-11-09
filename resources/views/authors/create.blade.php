@extends('layout')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">➕ Agregar Nuevo Autor</h2>

    <form action="{{ route('authors.store') }}" method="POST" class="w-75 mx-auto">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Autor</label>
            <input type="text" name="name" class="form-control" required placeholder="Ej. Gabriel García Márquez">
        </div>

        <div class="mb-3">
            <label for="nationality" class="form-label">Nacionalidad</label>
            <input type="text" name="nationality" class="form-control" placeholder="Ej. Colombiana">
        </div>

        <div class="mb-3">
    <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
    <input type="date" name="birth_date" class="form-control">
</div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar Autor</button>
        </div>
    </form>
</div>
@endsection
