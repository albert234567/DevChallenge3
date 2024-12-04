@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nou Producte</h1>

  
    <form action="{{ route('productes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom del Producte:</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoria:</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                <option value="">Selecciona una categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            
            <button type="button" class="btn btn-outline-secondary mt-2" data-toggle="modal" data-target="#createCategoryModal">
                Afegir Categoria
            </button>
        </div>

        <div class="form-group">
            <label for="quantitat">Quantitat:</label>
            <input type="number" class="form-control" id="quantitat" name="quantitat" min="1" value="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Producte</button>
    </form>
</div>


<div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nova Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="newCategoryForm">
                    @csrf
                    <div class="form-group">
                        <label for="categoryName">Nom de la Categoria:</label>
                        <input type="text" class="form-control" id="categoryName" name="name" required>
                    </div>
                    <div class="alert alert-danger d-none" id="category-error"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="saveCategory">Crear Categoria</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.getElementById('saveCategory').addEventListener('click', function() {
        var categoryName = document.getElementById('categoryName').value;

        
        if (!categoryName) {
            alert('Por favor, introduce un nombre para la categoría.');
            return;
        }

        fetch('{{ route('categorias.store') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name: categoryName })
        })
        .then(response => response.json())
        .then(data => {
            
            if (data.success) {
                var option = document.createElement('option');
                option.value = data.category.id; 
                option.text = data.category.name;
                document.getElementById('categoria_id').appendChild(option);
                $('#createCategoryModal').modal('hide'); 
                document.getElementById('newCategoryForm').reset(); 
            } else {
                alert('Error al crear la categoría.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al crear la categoría.');
        });
    });
</script>

@endsection
