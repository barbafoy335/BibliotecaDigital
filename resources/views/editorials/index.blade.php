@extends('layout')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">📘 Lista de Editoriales</h1>
        <a href="{{ route('editorials.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nuevo Editorial
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
            <form action="{{ route('editorials.index') }}" method="GET" class="row g-3">
                <div class="col-md-10">
                    <input type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        class="form-control" 
                        placeholder="Buscar por nombre...">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
                @if(request('search'))
                    <div class="col-12">
                        <a href="{{ route('editorials.index') }}" class="btn btn-sm btn-outline-secondary">Limpiar búsqueda</a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    @if($editorials->isEmpty())
        <div class="alert alert-info text-center">
            <p class="mb-0">No hay editoriales registradas aún.</p>
        </div>
    @else
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>País</th>
                                
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($editorials as $editorial)
                            <tr>
                                <td class="fw-semibold">{{ $editorial->nombre }}</td>
                                <td>{{ $editorial->telefono ?? 'N/A' }}</td>
                                <td>{{ $editorial->correo ?? 'N/A' }}</td>
                                <td>{{ $editorial->pais ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('editorials.edit', $editorial->id_editorial)}}" 
                                    class="btn btn-sm btn-warning me-1">
                                        Editar
                                    </a>
                                    <form action="{{ route('editorials.destroy', $editorial->id_editorial) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="return confirm('¿Seguro que deseas eliminar esta editorial?')">
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
        <div class="mt-3 d-flex justify-content-end text-center" style= "display:none">
            {!! $editorials->links() !!}
        </div>
        
    @endif
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
