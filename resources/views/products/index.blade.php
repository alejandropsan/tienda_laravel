@extends('layouts.master')

{{-- SECTION HACE REFERENCIA AL YIELD DEL LAYOUT MASTER --}}
@section('content')

<h1>Listado de productos</h1>

<a class="btn btn-success" href="{{ route('products.create') }}">Crear</a>

    {{-- @if(empty($products)) --}}
    {{-- TAMBIÉN SE PUEDE HACER --}}
    @empty($products)
    <div class="alert alert-warning">
        La lista de productos está vacía
    </div>

    @else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <thead>
                    <tbody>

                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->status }}</td>
                            <td><a class="btn btn-link" href="{{ route('products.show', ['product' => $product->id]) }}">Ver</a></td>
                            <td><a class="btn btn-link" href="{{ route('products.edit', ['product' => $product->id]) }}">Editar</a></td>
                            <td>
                                <form method="post" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-link" type="submit">Eliminar</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </thead>
            </thead>
        </table>
    </div>
</body>

{{-- @endif --}}
@endempty

@endsection

