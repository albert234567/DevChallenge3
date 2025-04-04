@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Llistes</h1>
    <a href="{{ route('llistas.create') }}" class="btn btn-primary mb-3">Crear una nova llista</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($llistas as $llista)
                <tr>
                    <td><a href="{{ route('llistas.show', $llista->id) }}" class="link-llista">{{ $llista->name }}</a></td>
                    
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

@endsection
