@extends('layouts.master')

{{-- SECTION HACE REFERENCIA AL YIELD DEL LAYOUT MASTER --}}
@section('content')

    <h1>{{ $product->title }}  ({{ $product->id }})</h1>
    <p>{{ $product->description }}</p>
    <p>{{ $product->price }}</p>
    <p>{{ $product->stock }}</p>
    <p>{{ $product->status }}</p>

    {!! $html !!}
@endsection
