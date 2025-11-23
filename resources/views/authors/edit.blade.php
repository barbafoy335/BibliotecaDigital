@extends('layout')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">✏️ Editar Autor</h2>

    @if ($errors->any())
        <div class="alert alert-danger w-75 mx-auto">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.update', $author->id_autor) }}" method="POST" class="w-75 mx-auto">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombres_autor" class="form-label">Nombre del Autor</label>
            <input type="text" name="nombres_autor" id="nombres_autor" value="{{ old('nombres_autor', $author->nombres_autor) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="apellidos_autor" class="form-label">Apellido del Autor</label>
            <input type="text" name="apellidos_autor" id="apellidos_autor" value="{{ old('apellidos_autor', $author->apellidos_autor) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" name="nacionalidad" id="nacionalidad" value="{{ old('nacionalidad', $author->nacionalidad) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $author->fecha_nacimiento) }}" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Autor</button>
        </div>
    </form>
</div>
@endsection
