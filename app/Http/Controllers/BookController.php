<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Editorial;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(relations: ['autor', 'categoria', 'editorial']);

        // Si hay una búsqueda
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('titulo', 'like', "%{$search}%")
                ->orWhere('isbn', 'like', "%{$search}%")
                ->orWhereHas('autor', function($q) use ($search) {
                    $q->where('nombres_autor', 'like', "%{$search}%")
                    ->orWhere('apellidos_autor', 'like', "%{$search}%");})
                ->orWhereHas('categoria', function($q) use ($search) {
                    $q->where('nombre_categoria', 'like', "%{$search}%");})
                ->orWhereHas('editorial', function($q) use ($search) {
                    $q->where('nombre', 'like', "%{$search}%");
                });
                
        }

        $books = $query->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $editorials = Editorial::all();
        return view('books.create', compact('authors', 'categories', 'editorials'));
    }

    public function store(Request $request)
    {
        // Validar los campos del formulario
        $request->validate([
            'titulo' => 'nullable|string|max:100',
            'id_autor' => 'nullable|exists:autor,id_autor',
            //'id_categoria' => 'nullable|exists:categoria,id_categoria',
            //'isbn' => 'nullable|string|min:12|max:17|unique:libro,isbn',
            'anio_creacion' => 'nullable|integer|min:1971|max:2025',
            
        ]);


        /* ✅ AUTOR */
        if ($request->id_autor === "nuevo") {

            // ✅ Creación segura de autor sin campos obligatorios
            $nuevoAutor = Author::create([
                'nombres_autor'   => $request->nuevo_nombres_autor  ?? null,
                'apellidos_autor' => $request->nuevo_apellidos_autor ?? null,
                'fecha_nacimiento' => $request->nuevo_fecha_nacimiento ?? now(), // evita error NOT NULL
                'nacionalidad'    => $request->nuevo_nacionalidad ?? 'Desconocida', // valor por defecto
            ]);

            $idAutor = $nuevoAutor->id_autor;

        } else {
            $idAutor = $request->id_autor ?? null;
        }


        /* ✅ CATEGORÍA */
        if ($request->id_categoria === "nueva") {
            $nuevaCategoria = Category::create([
                'nombre_categoria' => $request->nuevo_nombre_categoria ?? null,
                'observacion'      => $request->nuevo_observacion ?? null,
            ]);

            $idCategoria = $nuevaCategoria->id_categoria;

        } else {
            $idCategoria = $request->id_categoria ?? null;
        }

        /* ✅ EDITORIAL */
        if ($request->id_editorial === "nuevo") {
            $nuevaEditorial = Editorial::create([
                'nombre' => $request->nuevo_nombre_editorial ?? null,
                'observacion'      => $request->nuevo_observacion ?? null,
            ]);

            $idEditorial = $nuevaEditorial->id_editorial;

        } else {
            $idEditorial = $request->id_editorial ?? null;
        }



        /* ✅ CREAR LIBRO SIN CAMPOS OBLIGATORIOS */
        Book::create([
            'titulo'          => $request->titulo,
            'isbn'            => $request->isbn,
            'nombre_editorial'=> $request->nombre_editorial,
            'anio_creacion'   => $request->anio_creacion,
            'id_autor'        => $idAutor,
            'id_categoria'    => $idCategoria,
            'id_editorial'    => $idEditorial,
        ]);

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
        $editorials = Editorial::all();
        return view('books.edit', compact('book', 'authors', 'categories', 'editorials'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'titulo' => 'required|string|max:100',
            'id_autor' => 'required|exists:autor,id_autor',
            'id_categoria' => 'required|exists:categoria,id_categoria',
            'id_editorial' => 'required|exists:editorial,id_editorial', 
            'isbn' => 'required|string|min:12|max:17|unique:libro,isbn,' . $book->id_libro . ',id_libro',
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

