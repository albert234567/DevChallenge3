<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Mostra totes les categories
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    // Mostra el formulari per crear una categoria
    public function create()
    {
        return view('categorias.create');
    }

    // Crea i guarda una nova categoria
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $categoria = Categoria::create($request->all());

        return response()->json([
            'success' => true,
            'category' => $categoria,
        ]);
    }

    // Mostra el formulari per editar una categoria
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    // Actualitza una categoria existent
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria actualizada correctament.');
    }

    // Elimina una categoria
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria eliminada correctament.');
    }
}
