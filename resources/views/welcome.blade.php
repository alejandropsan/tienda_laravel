@extends('layouts.master')



{{-- SECTION HACE REFERENCIA AL YIELD DEL LAYOUT MASTER --}}
@section('content')

<h1>Welcome</h1>

@if(isset($user))
    <div class="alert alert-success">
        Bienvenido {{ $user->nombre }}!!
    </div>
@endif
<p>Comenzamos!!</p>

<div class="navbar">
    <ul>
        <li>
            <a href="{{ route('register') }}">Formulario de registro</a>
        </li>
        <li>
            <a href="{{ route('login') }}">Login</a>
        </li>
        <li>
            <a href="{{ route('logout') }}">Logout</a>
        </li>
    </ul>

</div>


<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Todos los tipos de productos</h2>
            <nav>
                <ul>
                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">Videojuegos</h5>
                            <p>Elige entre todos nuestros tipos de videojuegos</p>
                            <button class="btn btn-secondary"><a href="{{ route('select.videogames') }}">Ir a la lista de videojuegos</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">Películas</h5>
                            <p>Consigue una de nuestras películas</p>
                            <button class="btn btn-secondary"><a href="{{ route('select.films') }}">Ir a la lista de películas</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">Merchandising</h5>
                            <p>Elige entre todo nuestro merchandising</p>
                            <button class="btn btn-secondary"><a href="{{ route('select.merchandising') }}">Ir a la lista de merchandising</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">Libros</h5>
                            <p>Obtén todos nuestros libros disponibles</p>
                            <button class="btn btn-secondary"><a href="{{ route('select.books') }}">Ir a la lista de libros</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">Podcasts</h5>
                            <p>Descarga todos nuestros podcast y escúchalos en cualquier momento</p>
                            <button class="btn btn-secondary"><a href="{{ route('select.podcasts') }}">Ir a la lista de podcasts</a></button>
                        </div>
                    </li>
                        <br>
                        <hr>

                    <li>
                        <div class="ajax">
                            <h5 class="title-method my-3">Series</h5>
                            <p>Consigue cualquier serie de Netflix</p>
                            <button class="btn btn-secondary"><a href="{{ route('select.series') }}">Ir a la lista de series</a></button>
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



