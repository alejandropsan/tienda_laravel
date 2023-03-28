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

<script>

</script>

@endsection
