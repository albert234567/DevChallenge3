<?php

namespace App\Http\Controllers;

use App\Models\Producte;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProducteController extends Controller
{
    // Mostra tots els productes amb la seva categoria
    public function index()
    {
        $productes = Producte::with('categoria')->get();
        return view('productes.index', compact('productes'));
    }

    // Mostra el formulari per crear un nou producte
    public function create()
    {
        $categories = Categoria::all(); // Obtenim totes les categories
        return view('productes.create', compact('categories'));
    }

    // Desa un nou producte després de validar la informació
    public function store(Request $request)
    {
        // Validació de les dades d'entrada
        $request->validate([
            'nom' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'quantitat' => 'required|integer|min:1',
        ]);

        // Comprovem si el producte ja existeix en la base de dades
        $existingProduct = Producte::where('nom', $request->input('nom'))
                                   ->where('categoria_id', $request->input('categoria_id'))
                                   ->first();

        if ($existingProduct) {
            // Si el producte existeix, es mostra un missatge d'error
            return redirect()->route('productes.index')->with('error', 'Aquest producte ja existeix en aquesta categoria. Si necessites més quantitat, edita el producte!');
        }

        // Si el producte no existeix, es crea el nou producte
        Producte::create([
            'nom' => $request->input('nom'),
            'categoria_id' => $request->input('categoria_id'),
            'quantitat' => $request->input('quantitat'),
        ]);

        // Es redirigeix amb un missatge de confirmació
        return redirect()->route('productes.index')->with('success', 'Producte creat correctament!');
    }

    // Mostra el formulari per editar un producte existent
    public function edit(Producte $producte)
    {
        $categories = Categoria::all(); // Obtenim totes les categories
        return view('productes.edit', compact('producte', 'categories'));
    }

    // Actualitza les dades d'un producte existent
    public function update(Request $request, Producte $producte)
    {
        // Validació de les dades d'entrada
        $request->validate([
            'nom' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        // Actualització del producte
        $producte->update($request->all());

        // Redirigeix amb missatge d'èxit
        return redirect()->route('productes.index')->with('success', 'Producte actualitzat correctament!');
    }

    // Elimina un producte
    public function destroy(Producte $producte)
    {
        $producte->delete();
        return redirect()->route('productes.index')->with('success', 'Producte eliminat correctament!');
    }

    // Canvia l'estat de completat d'un producte
    public function toggle(Producte $producte)
    {
        $producte->completat = !$producte->completat; // Alterna l'estat de completat
        $producte->save(); // Desa el canvi

        return redirect()->route('productes.index')->with('success', 'Producte actualitzat correctament!');
    }
}
