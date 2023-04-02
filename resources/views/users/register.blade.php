@extends('layouts.master')
@section('content')


<div class="container">
        <div class="col-md-6 justify-content-md-center">
            <div class="row">
                <h1>Formulario de registro</h1>
                <div class="text-center mb-3"></div>
                <form action="{{ route('register.save') }}" class="form-group col-6 mb-3" method="post">
                    @csrf
                    <div class="form-group">

                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control my-3" value="{{old('nombre')}}" required>

                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control my-3" value="{{old('apellidos')}}" required>

                        <label for="nombre">Edad</label>
                        <input type="text" name="edad" class="form-control my-3" value="{{old('edad')}}" required>

                        <label for="ciudad">Ciudad</label>
                        <input type="text" name="ciudad" class="form-control my-3" value="{{old('ciudad')}}" required>
                        <div class="form-check">
                            <label for="rol_user" class="d-block my-2">Rol de usuario</label>
                            <input class="form-check-input ms-2" name="rol_user" type="checkbox" value="empresa" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Empresa
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input ms-2" name="rol_user" type="checkbox" value="particular" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                              Particular
                            </label>
                          </div>

                        <label for="email" class="mt-3">Email</label>
                        <input type="email" name="email" class="form-control my-3" value="{{old('email')}}" required>

                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control my-3" value="{{old('password')}}" required>

                        <button type="submit" class="btn btn-success btn-sm">Regístrate</button>
                    </div>
                </div>
                </form>
        </div>

        </div>


</div>
