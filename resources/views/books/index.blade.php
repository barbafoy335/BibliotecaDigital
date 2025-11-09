@extends('layout')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">📘 Lista de Libros</h1>
        <a href="{{ route('books.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nuevo Libro
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
            <form action="{{ route('books.index') }}" method="GET" class="row g-3">
                <div class="col-md-10">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           class="form-control" 
                           placeholder="Buscar por título, ISBN o autor...">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
                @if(request('search'))
                    <div class="col-12">
                        <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-secondary">Limpiar búsqueda</a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    @if($books->isEmpty())
        <div class="alert alert-info text-center">
            <p class="mb-0">No hay libros registrados aún.</p>
        </div>
    @else
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Categoría</th>
                                <th>Año</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td class="fw-semibold">{{ $book->titulo }}</td>
                                <td>{{ $book->autor->nombres_autor ?? 'N/A' }} {{ $book->autor->apellidos_autor ?? '' }}</td>
                                <td>
                                    <span class="badge bg-secondary">{{ $book->categoria->nombre_categoria ?? 'N/A' }}</span>
                                </td>
                                <td>{{ $book->anio_creacion }}</td>
                                <td class="text-center">
                                    <a href="{{ route('books.edit', $book->id_libro) }}" 
                                       class="btn btn-sm btn-warning me-1">
                                        Editar
                                    </a>
                                    <form action="{{ route('books.destroy', $book->id_libro) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="return confirm('¿Seguro que deseas eliminar este libro?')">
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
            {{ $books->links() }}
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
