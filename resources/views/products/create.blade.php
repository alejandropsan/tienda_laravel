@extends('layouts.master')

{{-- SECTION HACE REFERENCIA AL YIELD DEL LAYOUT MASTER --}}
@section('content')

    <h1>Crear un nuevo producto</h1>
    <form  method="post" action="{{ route('products.store') }}">
        @csrf
        <div class="form-row">
            <label for="title">Título</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}" required />
        </div>

        <div class="form-row">
            <label for="description">Descipción</label>
            <input class="form-control" type="text" name="description" value="{{ old('description') }}" required />
        </div>

        <div class="form-row">
            <label for="price">Precio</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="price" value="{{ old('price') }}" required />
        </div>

        <div class="form-row">
            <label for="stock">Stock</label>
            <input class="form-control" type="number" name="stock" min="0" value="{{ old('stock') }}" required />
        </div>

        <div class="form-row">
            <label for="status">Status</label>
            <select class="custom-select" name="status" required>
                <option value="" selected>Select...</option>
                <option {{ old('status') == 'available' ? 'selected' : '' }} value="available">Disponible</option>
                <option {{ old('status') == 'unavailable' ? 'selected' : '' }} value="unavailable">No disponible</option>
            </select>

        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Crear producto</button>
        </div>
        </div>


    </form>


@endsection
