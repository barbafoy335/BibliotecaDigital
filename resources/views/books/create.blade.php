@extends('layout')

@section('content')
<div class="w-50 mx-auto">
    <h2 class="text-center mb-4">➕ Agregar Nuevo Libro</h2>
    
    <!-- Tarjetas de Navegación 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        {{-- Título --}}
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        {{-- Autor --}}
        <div class="mb-3">
            <label for="id_autor" class="form-label">Autor</label>
            <select type="select" name="id_autor" id="id_autor" class="form-control form-select" onchange="toggleNuevoAutor()" required>
                <option value="">Seleccionar Autor</option>
                @foreach($authors as $autor)
                    <option value="{{ $autor->id_autor }}">
                    {{ $autor->nombres_autor }} {{ $autor->apellidos_autor }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Categoria --}}
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select name="id_categoria" id="id_categoria" class="form-control form-select" required>
                <option value="">Seleccionar Categoria</option>
                @foreach($categories as $categoria)
                    <option value="{{ $categoria->id_categoria }}">
                    {{ $categoria->nombre_categoria }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Editorial --}}
        <div class="mb-3">
            <label class="form-label">Editorial</label>
            <select name="id_editorial" class="form-control form-select">
                <option value="">Seleccionar Editorial</option>
                @foreach($editorials as $editorial)
                    <option value="{{ $editorial->id_editorial }}">
                    {{ $editorial->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- ISBN --}}
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control">
        </div>
        
        {{-- Año --}}
        <div class="mb-3">
            <label for="anio_creacion" class="form-label">Año</label>
            <input type="number" name="anio_creacion" id="anio_creacion" class="form-control">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>



@endsection
