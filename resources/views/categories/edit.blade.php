@extends('layouts.app')

@section('content')
    <h1>Editar Categoría</h1>
    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre de la Categoría:</label>
        <input type="text" id="name" name="name" value="{{ $categoria->name }}" required>
        <button type="submit">Actualizar</button>
    </form>
@endsection
