@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Llista</h1>
    <form action="{{ route('llistas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <button type="submit" class="btn btn-success">Crear</button>
    </form>
</div>
@endsection
