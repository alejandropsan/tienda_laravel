@extends('layouts.master')
@section('content')


    <div class="row section justify-content-md-center mt-5">
        <div class="col-12 col-md-4">
            <div class="text-center mb-3">
                <h1>Accede a la plataforma</h1>
            </div>
                <form action="{{ route('login.send') }}" class="col-8 text-center ms-auto me-auto mb-3" method="post">
                    @csrf
                        <label for="email" class="mt-3">Email</label>
                        <input type="email" name="email" class="form-control my-3" value="{{old('email')}}" required>

                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control my-3" value="{{old('password')}}" required>

                        <button type="submit" class="btn btn-success btn-sm">Regístrate</button>
                </form>
        </div>
    </div>




