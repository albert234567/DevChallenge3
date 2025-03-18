@extends('layouts.app')

@section('content')
<div class="container">
    @vite('resources/js/app.js')

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

    {{-- Botons per navegar a les llistes --}}
    <div class="text-center mb-3">
        <a href="{{ route('llistas.index') }}" class="btn btn-custom mx-2">Anar a les llistes</a>
    </div>

    {{-- Nom de la llista --}}
    <h1>{{ $llista->name }}</h1>
    <hr>

    {{-- Botons per marcar/desmarcar els productes --}}
    <div class="text-center mb-3">
        <form action="{{ route('llistas.markAllCompleted', $llista->id) }}" method="POST" class="boton-espaiat">
            @csrf
            <button type="submit" class="btn btn-success btn-small">Marcar els productes</button>
        </form>

        <form action="{{ route('llistas.markAllUncompleted', $llista->id) }}" method="POST" class="boton-espaiat">
            @csrf
            <button type="submit" class="btn btn-warning btn-small">Desmarcar els productes</button>
        </form>

        <form action="{{ route('llistas.deleteAllProducts', $llista->id) }}" method="POST" class="boton-espaiat">
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('Estàs segur que vols eliminar tots els productes d\'aquesta llista?');">Eliminar tots els productes</button>
        </form>
    </div>

    {{-- Mostra el nombre de productes completats --}}
    <h2>Productes en aquesta llista: <span class="text-success">{{ $productes->where('completat', true)->count() }}</span> / {{ $productes->count() }} completats.</h2>

    {{-- Taula amb els productes --}}
    <div class="card mb-4">
        <div class="card-body">
            @if($productes->isEmpty())
                <p>No hi ha productes en aquesta llista.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom del Producte</th>
                            <th>Quantitat</th>
                            <th>Categoria</th>
                            <th>Estat</th> {{-- Nova columna per l'estat completat --}}
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
                                            {{ $producte->name }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <span class="text-muted">Quantitat:</span> {{ $producte->quantitat }}
                                </td>
                                <td>
                                    {{-- Mostra la categoria del producte o un missatge si no en té --}}
                                    @if($producte->categoria_nom)
                                        <span class="badge badge-info">{{ $producte->categoria_nom }}</span>
                                    @else
                                        <span class="badge badge-secondary">Sense categoria</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- Mostra una creu o un cercle depenent de si el producte està completat --}}
                                    @if($producte->completat)
                                        <span class="text-success"><i class="bi bi-check-circle">O</i></span>
                                    @else
                                        <span class="text-danger"><i class="bi bi-x-circle"></i>X</span>
                                    @endif
                                </td>

                                <td>
                                    {{-- Botó per editar el producte --}}
                                    <a href="{{ route('productes.editProd', [$llista->id, $producte->id]) }}" class="btn btn-warning">Editar</a>

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

    {{-- Formulari per afegir productes --}}
    <h2>Agregar producte</h2>
    <form action="{{ route('llistas.agregarProducto', $llista->id) }}" method="POST" id="add-product-form">
        @csrf
        <div class="form-group">
            <label for="name">Nom del producte:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="quantitat">Quantitat:</label>
            <input type="number" name="quantitat" id="quantitat" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" id="categoria" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3" id="submit-product-btn">Afegir</button>
    </form>

    <hr>

    <h2>Copiar enllaç de la llista</h2>
    <div id="shareLink">
        <button type="button" id="generate-share-link-button" class="btn btn-secondary mt-3">Generar enllaç de compartir</button>
        <div id="enlaceMarco" style="display: none;" class="mt-2">
            <div class="input-group">
                <input type="text" id="linkInput" class="form-control" readonly>
                <div class="input-group-append">
                    <button id="copyButton" class="btn btn-primary" type="button">Copiar</button>
                </div>
            </div>
            <small id="copyStatus" class="text-success" style="display: none;">Enllaç copiat!</small>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const generateButton = document.getElementById('generate-share-link-button');
        const copyButton = document.getElementById('copyButton');
        const enlaceMarco = document.getElementById('enlaceMarco');
        const linkInput = document.getElementById('linkInput');
        const copyStatus = document.getElementById('copyStatus');

        // Gestionar la generació de l'enllaç
        generateButton.addEventListener('click', function() {
            fetch('{{ route('llistas.getShareLink', $llista->id) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Mostrar l'enllaç a l'input
                linkInput.value = data;
                enlaceMarco.style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al generar l\'enllaç.');
            });
        });

        // Gestionar la còpia al portapapers
        copyButton.addEventListener('click', function() {
            // Seleccionar el text de l'input
            linkInput.select();
            linkInput.setSelectionRange(0, 99999); // Per a dispositius mòbils

            // Copiar al portapapers
            navigator.clipboard.writeText(linkInput.value)
                .then(() => {
                    // Mostrar missatge de confirmació
                    copyStatus.style.display = 'block';

                    // Amagar el missatge després de 2 segons
                    setTimeout(() => {
                        copyStatus.style.display = 'none';
                    }, 2000);
                })
                .catch(err => {
                    console.error('No s\'ha pogut copiar el text: ', err);
                    alert('Error al copiar l\'enllaç.');
                });
        });
    });
    </script>

@endsection
