@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Producte: {{ $producte->nom }}</h1>
    <form action="{{ route('productes.update', $producte->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom del Producte</label>
            <input type="text" class="form-control" name="nom" value="{{ $producte->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $producte->categoria_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select> 
        </div>

        <div class="mb-3">
            <label for="quantitat" class="form-label">Quantitat</label>
            <input type="number" class="form-control" name="quantitat" value="{{ $producte->quantitat }}" required min="0">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="completat" value="1" {{ $producte->completat ? 'checked' : '' }}>
            <label class="form-check-label" for="completat">Completat</label>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producte</button>
    </form>
</div>
@endsection
