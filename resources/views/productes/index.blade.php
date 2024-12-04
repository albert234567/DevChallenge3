@extends('layouts.app')

@section('content')
<div class="container">
   
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif

   
    <div class="text-center mb-3">
        <a href="{{ route('llistas.index') }}" class="btn btn-volver-llistes mx-2">Anar a les llistes</a>
    </div>

    <h1>Productes</h1>
    <a href="{{ route('productes.create') }}" class="btn btn-primary">Crear un nou producte</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Categoria</th>
                <th>Quantitat</th> 
                <th>Completat</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productes as $producte)
                <tr>
                    <td>{{ $producte->id }}</td>
                    <td>
                       
                        <form action="{{ route('producte.toggle', $producte->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link {{ $producte->completat ? 'text-completat' : '' }}">
                                {{ $producte->nom }}
                            </button>
                        </form>
                    </td>
                    <td>{{ $producte->categoria->name ?? 'N/A' }}</td>
                    <td>{{ $producte->quantitat }}</td> 
                    <td>
                        <input type="checkbox" {{ $producte->completat ? 'checked' : '' }} disabled>
                    </td>
                    <td>
                        <a href="{{ route('productes.edit', $producte) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('productes.destroy', $producte) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
