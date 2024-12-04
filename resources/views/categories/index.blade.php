@extends('layouts.app')

@section('content')
    <h1>Categoríes</h1>
    <a href="{{ route('categorias.create') }}">Crear Nova Categoría</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->name }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria) }}">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
