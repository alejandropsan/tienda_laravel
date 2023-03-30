@extends('layouts.master')



{{-- SECTION HACE REFERENCIA AL YIELD DEL LAYOUT MASTER --}}
@section('content')


<h1>Welcome</h1>
<p>Comenzamos!!</p>

<div class="form-group">
    <label>
        <input type="checkbox" name="user_type" value="particular"> Particular
    </label>
</div>

<div class="form-group">
    <label>
        <input type="checkbox" name="user_type" value="empresas"> Empresa
    </label>
</div>

<input type="checkbox" id="mi-checkbox" name="mi-checkbox" value="1" onclick="createTypeUser">
<label for="mi-checkbox">Seleccionar</label>


<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Ejemplos de compartición de variables</h2>
            <nav>
                <ul>
                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">1er Método</h5>
                            <p>Compartir usuario con el modelo AJAX</p>
                            <button class="btn btn-secondary"><a href="{{ route('send') }}">Ir al método</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">2do Método</h5>
                            <p>Compartir un tipo de usuario por los controladores</p>
                            <button class="btn btn-secondary"><a href="{{ route('user.laravel') }}">Ir al método</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">3er Método</h5>
                            <p>Compartir usuario con el modelo AJAX</p>
                            <button class="btn btn-secondary"><a href="{{ route('send') }}">Ir al método</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">4to Método</h5>
                            <p>Compartir usuario con el modelo AJAX</p>
                            <button class="btn btn-secondary"><a href="{{ route('send') }}">Ir al método</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">5to Método</h5>
                            <p>Compartir usuario con el modelo AJAX</p>
                            <button class="btn btn-secondary"><a href="{{ route('send') }}">Ir al método</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">6to Método</h5>
                            <p>Compartir usuario con el modelo AJAX</p>
                            <button class="btn btn-secondary"><a href="{{ route('send') }}">Ir al método</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">7tmo Método</h5>
                            <p>Compartir usuario con el modelo AJAX</p>
                            <button class="btn btn-secondary"><a href="{{ route('send') }}">Ir al método</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                </ul>
            </nav>
        </div>
</div>
<button></button>

@endsection
