@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $llista->name }}</h1>
 
    <ul class="list-group">
        @foreach ($llista->productes as $producte)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="letrasProductes">  
                    {{ $producte->name }}
                
                <span class="cantidadProducte">  
                    (Quantitat: {{ $producte->quantitat }})
                </span>
                </span>
                <span class="categoriaProducte ms-2">  
                   {{ $producte->categoria ? $producte->categoria->name : 'Sense categoria' }}
                </span>
                
                <div>
                    <a href="{{ route('productes.edit', $producte) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                    <form action="{{ route('llistas.quitarProducto', [$llista->id, $producte->id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Estàs segur que vols eliminar aquest producte?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                   </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection