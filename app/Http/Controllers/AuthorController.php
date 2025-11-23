<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $query = Author::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nombres_autor', 'like', "%{$search}%")
                ->orWhere('apellidos_autor', 'like', "%{$search}%")
                ->orWhere('nacionalidad', 'like', "%{$search}%");
        }

        $authors = $query->orderBy('id_autor', 'desc')->paginate(10);

        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres_autor' => 'nullable|string|max:100',
            'apellidos_autor' => 'nullable|string|max:100',
            'nacionalidad' => 'nullable|string|max:100',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        Author::create($request->all());

        return redirect()->route('authors.index')->with('success', 'Autor creado correctamente.');
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'nombres_autor' => 'required|string|max:100',
            'apellidos_autor' => 'required|string|max:100',
            'nacionalidad' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index')->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autor eliminado correctamente.');
    }
}



