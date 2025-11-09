@extends('layout')

@section('content')
<div class="w-50 mx-auto">
    <h2 class="text-center mb-4">✏️ Editar Libro</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categoría</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ $book->category }}">
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Año</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ $book->year }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
