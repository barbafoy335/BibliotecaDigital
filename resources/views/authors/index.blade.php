@extends('layout')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">✍️ Lista de Autores</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nuevo Autor
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Formulario de Búsqueda -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <form method="GET" action="{{ route('authors.index') }}" class="row g-3">
                <div class="col-md-10">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           class="form-control" 
                           placeholder="Buscar por nombre o nacionalidad...">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
                @if(request('search'))
                    <div class="col-12">
                        <a href="{{ route('authors.index') }}" class="btn btn-sm btn-outline-secondary">Limpiar búsqueda</a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    @if($authors->isEmpty())
        <div class="alert alert-info text-center">
            <p class="mb-0">No se encontraron autores.</p>
        </div>
    @else
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre Completo</th>
                                <th>Nacionalidad</th>
                                <th>Fecha de Nacimiento</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $author)
                            <tr>
                                <td class="fw-semibold">
                                    {{ $author->nombres_autor }} {{ $author->apellidos_autor }}
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $author->nacionalidad ?? 'Sin datos' }}</span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($author->fecha_nacimiento)->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('authors.edit', $author->id_autor) }}" 
                                       class="btn btn-sm btn-warning me-1">
                                        Editar
                                    </a>
                                    <form action="{{ route('authors.destroy', $author->id_autor) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="return confirm('¿Seguro que deseas eliminar este autor?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $authors->links() }}
        </div>
    @endif
</div>
@endsection
