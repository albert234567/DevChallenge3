@extends('layouts.app')

@section('content')
    <h1>Crear nova categoría</h1>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <label for="name">Nom de la Categoría:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Crear</button>
    </form>
@endsection
