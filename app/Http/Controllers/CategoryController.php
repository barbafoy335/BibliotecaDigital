<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id_categoria','DESC')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:categoria,nombre_categoria', 
            'pais' => 'required|string|max:100', 
            'ciudad' => 'nullable|string|max:100', 
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:100',
            'sitio_web' => 'nullable|url|max:100',
            'fecha_fundacion' => 'nullable|date',
            'activo' => 'nullable|boolean',
            'created_at' => 'nullable|date',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success','Categoría creada');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:categoria,nombre_categoria', 
            'pais' => 'required|string|max:100', 
            'ciudad' => 'nullable|string|max:100', 
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:100',
            'sitio_web' => 'nullable|url|max:100',
            'fecha_fundacion' => 'nullable|date',
            'activo' => 'nullable|boolean',
            'created_at' => 'nullable|date',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success','Categoría actualizada');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Categoría eliminada');
    }
}
