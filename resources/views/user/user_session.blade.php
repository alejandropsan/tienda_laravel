@extends('layouts.master')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Bienvenido!!</h1>
            <div class="content">
                <p>A partir de ahora eres un tipo de usuario como {{ $user_type }}</p>
            </div>
        </div>

    </div>


    @if($user_type == 'particular')
    <form action="{{ route('user.session') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <label for="nombre">Nombre particular</label>
                <input class="form-control" type="text" name="nombre">
            </div>
            <div class="form-group col-6">
                <div class="dni">
                    <label for="dni">DNI</label>
                    <input class="form-control" type="text" name="dni">
                </div>
                <div class="vat form-group" hidden>
                    <label for="vat">VAT</label>
                    <input class="form-control" type="text" name="vat" value="0">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    @endif

    @if($user_type == 'empresas')
    <form action="{{ route('user.session') }}" method="post">
        @csrf
        <div class="form-group col-md-6">
            <div class="form-group">
                <label for="nombre">Nombre empresa</label>
                <input class="form-control" type="text" name="nombre">
            </div>
            <div class="form-group col-md-6">
                <div class="dni">
                    <label for="dni">VAT</label>
                    <input class="form-control" type="text" name="dni">
                </div>
                <div class="vat form-group" hidden>
                    <label for="vat">VAT</label>
                    <input class="form-control" type="text" name="vat" value="1">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    @endif




</div>
