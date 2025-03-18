@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $llista->name }}</h1>
 
    @php
        $productesSorted = $llista->productes->sortBy(function ($producte) {
            return $producte->categoria ? $producte->categoria->name : 'ZZZZZ'; // 'ZZZZZ' per a què els "Sense categoria" apareguin al final
        });
    @endphp

    <ul class="list-group">
        @foreach ($productesSorted as $producte)
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
                

            </li>
        @endforeach
    </ul>
</div>
@endsection