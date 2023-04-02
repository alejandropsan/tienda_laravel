@extends('layouts.master')
@section('content')



<div class="container">
    <h1>VISTA DE COMPARTICIÓN</h1>

    <p>Con este botón obtienes la variable</p>
    <select name="user" id="user">
        <option value="select..." selected>Select</option>
        @foreach($users as $user)
        <option value="{{ $user->nombre }}">{{ $user->nombre }}</option>
        @endforeach
    </select>

    <button class="btn btn-success" id="btn-get-user">Cógela!!</button>
</div>

<script>

</script>
