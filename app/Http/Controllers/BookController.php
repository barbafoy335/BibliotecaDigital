<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['autor', 'categoria']);

        // Si hay una búsqueda
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('titulo', 'like', "%{$search}%")
                  ->orWhere('isbn', 'like', "%{$search}%")
                  ->orWhereHas('autor', function($q) use ($search) {
                      $q->where('nombres_autor', 'like', "%{$search}%")
                        ->orWhere('apellidos_autor', 'like', "%{$search}%");
                  });
        }

        $books = $query->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        // Validar los campos del formulario
        $request->validate([
            'titulo' => 'required|string|max:100',
            'id_autor' => 'required|exists:autor,id_autor',
            'id_categoria' => 'required|exists:categoria,id_categoria',
            'isbn' => 'required|string|min:12|max:17|unique:libro,isbn',
            'nombre_editorial' => 'required|string|max:100',
            'anio_creacion' => 'required|integer|min:1971|max:2025',
        ]);

        // Crear un nuevo libro con los datos validados
        Book::create($request->all());

        // Redirigir de nuevo al listado con mensaje de éxito
        return redirect()->route('books.index')->with('success', 'Libro agregado correctamente.');
    }

    public function show(Book $book)
    {
        $book->load(['autor', 'categoria']);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'titulo' => 'required|string|max:100',
            'id_autor' => 'required|exists:autor,id_autor',
            'id_categoria' => 'required|exists:categoria,id_categoria',
            'isbn' => 'required|string|min:12|max:17|unique:libro,isbn,' . $book->id_libro . ',id_libro',
            'nombre_editorial' => 'required|string|max:100',
            'anio_creacion' => 'required|integer|min:1971|max:2025',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Libro eliminado correctamente.');
    }
}

