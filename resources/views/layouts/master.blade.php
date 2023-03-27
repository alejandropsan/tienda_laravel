<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aprendiendo Laravel</title>
</head>
<body>
    {{-- @DUMP ES COMO DD O VAR_DUMP --}}
    {{-- @dump($errors) --}}

    {{-- GRACIAS A WITHERRORS YA NO HACE FALTA CREAR ESTA SESIÓN DE ERROR --}}
    {{-- @if(session()->has('error'))

    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>

    @endif --}}

    @if(session()->has('success'))

    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>

    @endif

    @if(isset($errors) && $errors->any())
    <div class="alert alert-danger">
       <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
       </ul>
    </div>
    @endif

    {{-- ESTO INDICA EL MODULO QUE CAMBIA. SE QUEDA EN ESPERA --}}
   @yield('content')
</body>
</html>
