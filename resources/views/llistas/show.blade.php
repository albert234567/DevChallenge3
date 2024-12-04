@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Missatges de success i error --}}
    @if(session('success'))
        <div class="alert alert-custom-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-custom-error mt-3">
            {{ session('error') }}
        </div>
    @endif

    {{-- Botons per navegar a les llistes i productes --}}
    <div class="text-center mb-3">
        <a href="{{ route('llistas.index') }}" class="btn btn-custom mx-2">Anar a les llistes</a>
        <a href="{{ route('productes.index') }}" class="btn btn-custom mx-2">Anar als productes</a>
    </div>

    {{-- Nom de la llista --}}
    <h1>{{ $llista->name }}</h1>
    <hr>

    {{-- Formularis per marcar tots els productes com a completats, desmarcar o eliminar --}}
    <form action="{{ route('llistas.markAllCompleted', $llista->id) }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-success mb-3">Marcar tots els productes com a completats</button>
    </form>

    <form action="{{ route('llistas.markAllUncompleted', $llista->id) }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-warning mb-3">Desmarcar tots els productes com a no completats</button>
    </form>

    <form action="{{ route('llistas.deleteAllProducts', $llista->id) }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger mb-3" onclick="return confirm('Estàs segur que vols eliminar tots els productes d\'aquesta llista?');">Eliminar tots els productes</button>
    </form>

    {{-- Mostra el nombre de productes completats --}}
    <h2>Productes en aquesta llista: <span class="text-success">{{ $productes->where('completat', true)->count() }}</span> / {{ $productes->count() }} completats.</h2>

    <div class="card mb-4">
        <div class="card-body">
            {{-- Si no hi ha productes, es mostra un missatge --}}
            @if($productes->isEmpty())
                <p>No hi ha productes en aquesta llista.</p>
            @else
                {{-- Taula amb els productes --}}
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom del Producte</th>
                            <th>Quantitat</th>
                            <th>Categoria</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productes as $producte)
                            <tr class="{{ $producte->completat ? 'table-success' : '' }}">
                                <td>
                                    {{-- Formulari per marcar/desmarcar un producte com a completat --}}
                                    <form action="{{ route('llistas.completarProducto', [$llista->id, $producte->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-link {{ $producte->completat ? 'text-completat' : '' }}">
                                            {{ $producte->nom }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <span class="text-muted">Quantitat:</span> {{ $producte->quantitat }}
                                </td>
                                <td>
                                    {{-- Mostra la categoria del producte o un missatge si no en té --}}
                                    @if($producte->categoria)
                                        <span class="badge badge-info">{{ $producte->categoria->name }}</span>
                                    @else
                                        <span class="badge badge-secondary">Sense categoria</span>
                                    @endif
                                </td>
                                <td>
                                     {{-- Botó per editar el producte --}}
                                     <a href="{{ route('productes.edit', $producte) }}" class="btn btn-warning">Editar</a>
                                   
                                    {{-- Formulari per eliminar un producte --}}
                                    <form action="{{ route('llistas.quitarProducto', [$llista->id, $producte->id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Estàs segur que vols eliminar aquest producte?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    {{-- Formulari per afegir un producte a la llista --}}
    <h2>Afegir producte a la llista</h2>
    <form action="{{ route('llistas.agregarProducto', $llista->id) }}" method="POST" id="add-product-form">
        @csrf
        <div class="form-group">
            <label for="producte_id">Selecciona un producte:</label>
            <select name="producte_id" id="producte_id" class="form-control" required>
                @if($productesDisponibles->isEmpty())
                    <option value="">No hi ha productes disponibles</option>
                @else
                    @foreach ($productesDisponibles as $producte)
                        <option value="{{ $producte->id }}">{{ $producte->nom }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3" id="submit-product-btn">Afegir</button>
    </form>

    <hr>
    {{-- Formulari per generar enllaç de compartir --}}
    <h2>Compartir aquesta llista mitjançant un enllaç</h2>
    <form action="{{ route('llistas.getShareLink', $llista->id) }}" method="POST" id="generate-share-link-form">
        @csrf
        <button type="submit" class="btn btn-secondary mt-3">Generar enllaç de compartir</button>
    </form>

    <div id="share-link-container" class="mt-3" style="display: none;">
        <p><strong>Enllaç generat:</strong></p>
        <input type="text" id="share-link" class="form-control" readonly>
        <button class="btn btn-primary mt-2" onclick="copyToClipboard()">Copiar enllaç</button>
    </div>
</div>

@endsection

@section('scripts')
// Formulari per generar enllaç
<form id="generate-share-link-form" action="/generate-link" data-id="123">
    <button type="button" onclick="mostrarEnlace()">Generar Enlace</button>
</form>

<div id="enlaceMarco" style="display: none; margin-top: 10px;">
    <a id="enlaceGenerado" href="#" target="_blank"></a>
</div>

<script>
    function mostrarEnlace() {
        // Envia una petició per obtenir l'enllaç generat
        const form = document.getElementById('generate-share-link-form');
        fetch(form.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: form.dataset.id })
        })
        .then(response => response.json())
        .then(data => {
            // Si es genera l'enllaç, es mostra
            if (data.link) {
                const enlaceGenerado = document.getElementById("enlaceGenerado");
                enlaceGenerado.href = data.link;
                enlaceGenerado.innerText = data.link;
                document.getElementById("enlaceMarco").style.display = "block";
            } else {
                alert('Error al generar el enlace.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endsection
