@extends('layout')

@section('content')
<div class="w-50 mx-auto">
    <h2 class="text-center mb-4">➕ Agregar Nuevo Editorial</h2>
    
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

    <form action="{{ route('editorials.store') }}" method="POST">
        @csrf

        {{-- Editorial --}}
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $editorial->nombre }}" required>
        </div>

        {{-- Telefono --}}
        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $editorial->telefono }}" required>
        </div>

        {{-- Correo --}}
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" id="correo" class="form-control" value="{{ $editorial->correo }}" required>
        </div>
        
        {{-- Pais --}}
        <div class="mb-3">
            <label for="pais" class="form-label">Pais</label>
            <input type="text" name="pais" id="pais" class="form-control" value="{{ $editorial->pais }} " required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>



@endsection
