<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: 600;
            font-size: 1.3rem;
        }
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        
        /* ===== FIX paginador Laravel (flechas gigantes) ===== */
        /* Normaliza tamaño de los SVG (<, >) en el paginador generado por $collection->links() */
        nav[role="navigation"] svg {
            width: 1rem;
            height: 1rem;
        }

        /* Normaliza tipografía del contenedor del paginador (opcional) */
        nav[role="navigation"] {
            font-size: 0.875rem; /* equivalente a text-sm */
            line-height: 1.25rem;
        }
        
        /* Si tu paginador trae botones en <button>, fuerza alineación vertical */
        nav[role="navigation"] .pagination .page-link {
            display: inline-flex;
            align-items: center;
            gap: .25rem;
        }
        /* ===== FIN FIX ===== */

    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container">
            <a class="navbar-brand" href="/">
                📚 Biblioteca Digital
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="bi bi-house-door"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">
                            <i class="bi bi-book"></i> Libros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('authors.index') }}">
                            <i class="bi bi-person"></i> Autores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('editorials.index') }}">
                            <i class="bi bi-person"></i> Editoriales
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">© {{ date('Y') }} Biblioteca Digital | Sistema de Gestión de Libros</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
