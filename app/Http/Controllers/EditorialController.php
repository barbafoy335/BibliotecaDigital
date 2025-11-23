<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index(Request $request)
    {
        $query = Editorial::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nombre', 'like', "%{$search}%")
                ->orWhere('pais', 'like', "%{$search}%");
        }

        $editorials = $query->orderBy('id_editorial', 'desc')->paginate(10);
        return view('editorials.index', compact('editorials'));
    }

    public function create()
    {
        return view('editorials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'correo' => 'nullable|email|max:100',
            'pais' => 'nullable|string|max:100',
        ]);

        Editorial::create($request->all());

        return redirect()->route('editorials.index')->with('success', 'Editorial creada correctamente.');
    }
    

    public function edit(Editorial $editorial)
    {
        return view('editorials.edit', compact('editorial'));
    }

    public function update(Request $request, Editorial $editorial)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'correo' => 'nullable|email|max:100',
            'pais' => 'nullable|string|max:100',
        ]);

        $editorial->update($request->all());

        return redirect()->route('editorials.index')->with('success', 'Editorial actualizada correctamente.');
    }

    public function destroy(Editorial $editorial)
    {
        $editorial->delete();
        return redirect()->route('editorials.index')->with('success','Editorial eliminada');
    }
}
