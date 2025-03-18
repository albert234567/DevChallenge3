<?php

namespace App\Http\Controllers;

use App\Models\Llista;
use App\Models\Producte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\LlistaInvitationMail;

class ProducteController extends Controller
{

    
    public function update(Request $request, Llista $llista, Producte $producte)
    {
        // Validació
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantitat' => 'required|integer|min:0',
            'categoria_nom' => 'nullable|string|max:255',
        ]);
    
        // Actualitzar el producte
        $producte->update([
            'name' => $validated['name'],
            'quantitat' => $validated['quantitat'],
            'categoria_nom' => $validated['categoria_nom'],
        ]);
    
        // Redirigir (assegura't de passar el paràmetre correctament)
        return redirect()->route('llistas.show', ['llista' => $llista->id])
                         ->with('success', 'Producte actualitzat correctament!');
    }
      
    

// Afegir també el mètode edit
public function edit(Llista $llista, Producte $producte)
{
    return view('productes.edit', compact('llista', 'producte'));
}
    
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
