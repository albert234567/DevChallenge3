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


class LlistaController extends Controller
{
    
    public function index()
    {
        // Filtra les llistes de l'usuari autenticat
        $llistas = Llista::where('created_by', auth()->id())->get();
    
        return view('llistas.index', compact('llistas'));
    }
    



    // Mostra el formulari per crear una llista
    public function create()
    {
        return view('llistas.create');
    }

    // Guarda una nova llista
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Llista::create($request->all());
        return redirect()->route('llistas.index')->with('success', 'Llista creada correctament!');
    }

    // Mostra el formulari per editar una llista
    public function edit(Llista $llista)
    {
        return view('llistas.edit', compact('llista'));
    }

    public function update(Request $request, Llista $llista)
    {
        // Validació del nom de la llista
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Actualitzar el nom de la llista
        $llista->name = $request->name;
        $llista->save();
    
        // Redirigir a la vista de la llista amb un missatge d'èxit
        return redirect()->route('llistas.index')
                         ->with('success', 'Llista actualitzada correctament!');
    }
    
    

    // Elimina una llista
    public function destroy(Llista $llista)
    {
        $llista->delete();
        return redirect()->route('llistas.index')->with('success', 'Llista eliminada correctament!');
    }

    // Comparteix una llista amb un altre usuari
    public function shareList(Request $request, Llista $llista)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $llista->sharedUsers()->attach($request->user_id);
        return redirect()->route('llistas.show', $llista->id)->with('success', 'Llista compartida correctament!');
    }

public function show(Llista $llista)
{
    $users = User::all();

    // Obtenir els productes que no estan associats a la llista
    $productesDisponibles = Producte::whereDoesntHave('llistas', function ($query) use ($llista) {
        $query->where('llistas.id', $llista->id);
    })->get();
    
    // Obtenir els productes associats a la llista i ordenar-los per categoria_nom
    $productes = $llista->productes()
        ->select('productes.*', 'productes.categoria_nom as categoria_name') // Afegim categoria_nom directament
        ->orderBy('productes.categoria_nom', 'asc') // Ordenem per categoria_nom
        ->get();
    
    // Obtenir totes les categories disponibles
    $categories = \App\Models\Categoria::all();

    return view('llistas.show', compact('llista', 'productes', 'categories'));
}


// Afegeix un producte a la llista
public function agregarProducto(Request $request, Llista $llista)
{
    // Validar el nom i la quantitat del producte
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'quantitat' => 'required|integer|min:1',
        'categoria' => 'nullable|string|max:255', // Valida la categoria com a text
    ]);

    // Crear el producte
    $producte = new Producte();
    $producte->name = $validated['name'];
    $producte->quantitat = $validated['quantitat'];

    // Si s'ha proporcionat una categoria
    if ($request->filled('categoria')) {
        // Assignar el nom de la categoria directament al producte
        $producte->categoria_nom = $request->categoria;
    }

    // Desa el producte i associa'l a la llista
    $producte->save();
    $llista->productes()->attach($producte);

    // Redirigeix amb missatge de confirmació
    return redirect()->route('llistas.show', $llista->id)
                     ->with('success', 'Producte afegit correctament');
}


    // Elimina un producte de la llista
    public function quitarProducto(Llista $llista, Producte $producte)
    {
        $llista->productes()->detach($producte->id);
        return redirect()->route('llistas.show', $llista)->with('success', 'Producte eliminat de la llista!');
    }

    // Marca un producte com completat/no completat
    public function completarProducto(Llista $llista, Producte $producte)
    {
        // Toggle (canvia l'estat de completat)
        $producte->completat = !$producte->completat;
        $producte->save();  // Desa el canvi a la base de dades

        // Redirigeix l'usuari a la vista de la llista amb un missatge de confirmació
        return redirect()->route('llistas.show', $llista)->with('success', 'Estat del producte actualitzat!');
    }


    // Convida un usuari a compartir la llista
    public function inviteUser(Request $request, Llista $llista)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->sharedLists()->attach($llista->id);
            return redirect()->route('llistas.show', $llista->id)->with('success', 'Invitació enviada!');
        }

        return redirect()->route('llistas.show', $llista->id)->with('error', 'Usuari no trobat.');
    }

    // Marca tots els productes com completats
    public function markAllCompleted($id)
    {
        $llista = Llista::findOrFail($id);
        $llista->productes()->update(['completat' => true]);

        return redirect()->route('llistas.show', $id)->with('success', 'Tots els productes marcats com completats.');
    }

    // Marca tots els productes com no completats
    public function markAllUncompleted($id)
    {
        $llista = Llista::findOrFail($id);
        $llista->productes()->update(['completat' => false]);

        return redirect()->route('llistas.show', $id)->with('success', 'Tots els productes desmarcats com no completats.');
    }

    // Elimina tots els productes d'una llista
    public function deleteAllProducts($id)
    {
        $llista = Llista::findOrFail($id);
        $llista->productes()->detach();

        return redirect()->route('llistas.show', $id)->with('success', 'Tots els productes eliminats de la llista.');
    }

    // Genera un enllaç per compartir la llista
    public function getShareLink($id)
    {
        $llista = Llista::findOrFail($id);

        if (!$llista->share_token) {
            $llista->share_token = Str::random(64);
            $llista->save();
        }

        $link = route('llistas.view', ['id' => $id, 'token' => $llista->share_token]);
        return response()->json($link);
    }

    // Mostra una vista pública d'una llista compartida
    public function view($id, Request $request)
    {
        $llista = Llista::where('id', $id)
            ->where('share_token', $request->input('token'))
            ->firstOrFail();

        return view('llistas.public-view', compact('llista'));
    }

}
