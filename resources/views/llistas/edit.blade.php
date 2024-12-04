@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Llista</h1>
    <form action="{{ route('llistas.update', $llista) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name" value="{{ $llista->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualitzar</button>
    </form>
</div>
@endsection
