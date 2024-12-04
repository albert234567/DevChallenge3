@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="text-center mb-3">
        <a href="{{ route('productes.index') }}" class="btn btn-volver-productes mx-2">Anar als productes</a>
    </div>

    <h1>Llistes</h1>
    <a href="{{ route('llistas.create') }}" class="btn btn-primary mb-3">Crear una nova llista</a>
    <div class="card">
        <div class="card-body">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($llistas as $llista)
                        <tr>
                          
                            <td><a href="{{ route('llistas.show', $llista->id) }}" class="link-llista">{{ $llista->id }}</a></td>
                            <td>{{ $llista->name }}</td>
                            <td>
                                <a href="{{ route('llistas.edit', $llista) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('llistas.destroy', $llista) }}" method="POST" style="display:inline;">
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
    </div>
</div>

@push('styles')
    <style>
       
        .table td .link-llista {
            display: inline-block;
            padding: 5px 10px;
            background-color: #f1f1f1;  
            color: gray;  
            border-radius: 5px;  
            text-decoration: none;  
            font-weight: bold;  
            transition: background-color 0.3s ease, color 0.3s ease;  
        }

      
        .table td .link-llista:hover {
            background-color: #007bff;  
            color: white;  
            text-decoration: none;  
            transform: scale(1.05);  
        }
    </style>
@endpush

@endsection
