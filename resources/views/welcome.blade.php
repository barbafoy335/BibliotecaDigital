@extends('layout')

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold mb-3">📚 Biblioteca Digital</h1>
        <p class="lead text-muted">Sistema de gestión de libros y autores</p>
    </div>

    <!-- Tarjetas de Navegación -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-5">
                    <div class="mb-3">
                        <span style="font-size: 3rem;">📖</span>
                    </div>
                    <h4 class="card-title mb-3">Libros</h4>
                    <p class="card-text text-muted mb-4">Gestiona el catálogo completo de libros de la biblioteca.</p>
                    <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg px-4">Ver Libros</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-5">
                    <div class="mb-3">
                        <span style="font-size: 3rem;">✍️</span>
                    </div>
                    <h4 class="card-title mb-3">Autores</h4>
                    <p class="card-text text-muted mb-4">Administra la información de los autores registrados.</p>
                    <a href="{{ route('authors.index') }}" class="btn btn-success btn-lg px-4">Ver Autores</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-6">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-5">
                    <div class="mb-3">
                        <span style="font-size: 3rem;">✍️</span>
                    </div>
                    <h4 class="card-title mb-3">Editoriales</h4>
                    <p class="card-text text-muted mb-4">Información descriptiva de las editoriales registradas.</p>
                    <a href="{{ route('editorials.index') }}" class="btn btn-success btn-lg px-4">Ver Editoriales</a>
                </div>
            </div>
        </div>
    </div> --}}
    
    <!-- Estadísticas -->
    <div class="text-center mb-4">
        <h3 class="fw-bold">Estadísticas</h3>
    </div>
    
    <div class="row g-4 justify-content-center">
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0 bg-primary text-white">
                <div class="card-body text-center py-4">
                    <h2 class="display-4 fw-bold mb-0">{{ App\Models\Book::count() }}</h2>
                    <p class="mb-0 mt-2">Libros</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0 bg-success text-white">
                <div class="card-body text-center py-4">
                    <h2 class="display-4 fw-bold mb-0">{{ App\Models\Author::count() }}</h2>
                    <p class="mb-0 mt-2">Autores</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0 bg-info text-white">
                <div class="card-body text-center py-4">
                    <h2 class="display-4 fw-bold mb-0">{{ App\Models\Category::count() }}</h2>
                    <p class="mb-0 mt-2">Categorías</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0 bg-secondary text-white">
                <div class="card-body text-center py-4">
                    <h2 class="display-4 fw-bold mb-0">{{ App\Models\Editorial::count() }}</h2>
                    <p class="mb-0 mt-2">Editoriales</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
