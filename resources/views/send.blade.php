@extends('layouts.master')
@section('content')



<div class="container">
    <h1>VISTA DE COMPARTICIÓN</h1>

    <p>Con este botón obtienes la variable</p>
    <select name="user" id="user">
        <option value="select..." selected>Select</option>
        @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->nombre }}</option>
        @endforeach
    </select>

    <button class="btn btn-success" id="btn-get-user">Cógela!!</button>
</div>


<script>
    function selectedUser(){
    $(document).ready(function(){
        $('#user').on('change', function(){

            var selected = $(this).val();
            console.log(selected);
            //  var url = new URL(window.location.href);
            //  var params = "{{ route('get.user', ['user' => ':userId']) }}".replace(':userId', selected);
            //  $('#btn-get-user').attr('href', url);
        });
    });

}
</script>
