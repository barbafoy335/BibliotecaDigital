@extends('layout')

@section('content')
<div class="w-50 mx-auto">
    <h2 class="text-center mb-4">✏️ Editar Libro</h2>

    {{--@if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif--}}

    <form action="{{ route('books.update', $book->id_libro) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Título --}}
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $book->titulo }}" required>
        </div>

        {{-- Autor --}}
        <div class="mb-3">
            <label class="form-label">Autor</label>
            <select name="id_autor" class="form-control form-select">
                @foreach($authors as $author)
                    <option value="{{ $author->id_autor }}" 
                        {{ $author->id_autor == $book->id_autor ? 'selected' : '' }}>
                        {{ $author->nombres_autor }} {{ $author->apellidos_autor }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Categoría --}}
        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="id_categoria" class="form-control form-select">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id_categoria }}"
                        {{ $cat->id_categoria == $book->id_categoria ? 'selected' : '' }}>
                        {{ $cat->nombre_categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Editorial --}}
        <div class="mb-3">
            <label class="form-label">Editorial</label>
            <select name="id_editorial" class="form-control form-select">
                @foreach($editorials as $edito)
                    <option value="{{ $edito->id_editorial }}"
                        {{ $edito->id_editorial == $book->id_editorial ? 'selected' : '' }}>
                        {{ $edito->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- ISBN --}}
        <div class="mb-3">
            <label class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}" required>
        </div>

        {{-- Año --}}
        <div class="mb-3">
            <label class="form-label">Año</label>
            <input type="number" name="anio_creacion" class="form-control" value="{{ $book->anio_creacion }}" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
