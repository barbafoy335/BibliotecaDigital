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

    <form action="{{ route('authors.update', $author->id) }}" method="POST" class="w-75 mx-auto">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Autor</label>
            <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nationality" class="form-label">Nacionalidad</label>
            <input type="text" name="nationality" id="nationality" value="{{ old('nationality', $author->nationality) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $author->birth_date) }}" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Autor</button>
        </div>
    </form>
</div>
@endsection
