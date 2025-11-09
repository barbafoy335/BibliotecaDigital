<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Biblioteca Digital')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Biblioteca Digital</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/books">Libros</a></li>
                    <li class="nav-item"><a class="nav-link" href="/authors">Autores</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3 mt-5">
        <p>© {{ date('Y') }} Biblioteca Digital | ECOTEC</p>
    </footer>

</body>
</html>
