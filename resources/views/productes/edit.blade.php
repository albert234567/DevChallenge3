@extends('layouts.app')
 
@section('content')
<div class="container">
    <h1>Editar Producte: {{ $producte->name }}</h1>

    {{-- Formulari per actualitzar el producte --}}
    <form action="{{ route('productes.update', [$llista->id, $producte->id]) }}" method="POST">
    @csrf
    @method('PUT')

        <input type="hidden" name="llista_id" value="{{ $llista->id }}">

        <div class="mb-3">
            <label for="name" class="form-label">Nom del Producte</label>
            <input type="text" class="form-control" name="name" value="{{ $producte->name }}" required>
        </div>

        <div class="mb-3">
            <label for="quantitat" class="form-label">Quantitat</label>
            <input type="number" class="form-control" name="quantitat" value="{{ $producte->quantitat }}" required min="0">
        </div>

        {{-- Afegir camp per actualitzar la categoria --}}
        <div class="mb-3">
            <label for="categoria_nom" class="form-label">Categoria</label>
            <input type="text" class="form-control" name="categoria_nom" value="{{ $producte->categoria_nom }}" placeholder="Introdueix el nom de la categoria">
        </div>

        <button type="submit" class="btn btn-primary">Actualitzar Producte</button>
    </form>
</div>
@endsection
